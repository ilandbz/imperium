<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\NotificacionCasilla;
use App\Models\CasillaElectronica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ExpedienteController extends Controller
{
    public function listar(Request $request)
    {
        $query = Expediente::with('userCreated');

        if ($request->search) {
            $query->where('codigo', 'like', "%{$request->search}%")
                ->orWhere('titulo', 'like', "%{$request->search}%");
        }

        return $query->orderBy('created_at', 'desc')->paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:expedientes,codigo',
            'ano' => 'required|integer',
            'titulo' => 'required|string',
            'materia' => 'nullable|string',
            'demandante' => 'nullable|string',
            'demandado' => 'nullable|string',
            'cuantia' => 'nullable|numeric',
        ]);

        $data['user_created_id'] = auth()->id();
        $data['estado'] = 'tramite';

        return Expediente::create($data);
    }

    public function show($id)
    {
        return Expediente::with(['userCreated', 'notificaciones.casilla.user.persona'])->findOrFail($id);
    }

    /**
     * Lógica para enviar una notificación desde un expediente a una casilla
     */
    public function notificar(Request $request)
    {
        $request->validate([
            'expediente_id' => 'required|exists:expedientes,id',
            'casilla_electronica_id' => 'required|exists:casilla_electronicas,id',
            'asunto' => 'required|string',
            'mensaje' => 'nullable|string',
            'tipo' => 'required|string',
            'documento' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        $filePath = null;
        if ($request->hasFile('documento')) {
            $filePath = $request->file('documento')->store('casillas/notificaciones', 'public');
        }

        // Generar número de notificación correlativo (simple para el ejemplo)
        $count = NotificacionCasilla::whereYear('created_at', date('Y'))->count() + 1;
        $numNotificacion = 'NOT-' . date('Y') . '-' . str_pad($count, 6, '0', STR_PAD_LEFT);

        $notificacion = NotificacionCasilla::create([
            'casilla_electronica_id' => $request->casilla_electronica_id,
            'expediente_id' => $request->expediente_id,
            'numero_notificacion' => $numNotificacion,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'tipo' => $request->tipo,
            'documento_path' => $filePath ? asset('storage/' . $filePath) : null,
            'user_created_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Notificación enviada con éxito',
            'data' => $notificacion
        ]);
    }
}
