<?php

namespace App\Http\Controllers;

use App\Models\NotificacionCasilla;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificacionCasillaController extends Controller
{
    public function listar(Request $request)
    {
        $user = auth()->user();
        $user->load('casilla');

        if (!$user->casilla) {
            return response()->json(['error' => 'No tienes casilla'], 404);
        }

        return NotificacionCasilla::where('casilla_electronica_id', $user->casilla->id)
            ->with('expediente')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }

    public function show($id)
    {
        $user = auth()->user();
        $user->load('casilla');

        $notificacion = NotificacionCasilla::with('expediente')
            ->where('casilla_electronica_id', $user->casilla->id)
            ->findOrFail($id);

        return $notificacion;
    }

    public function marcarLeida($id)
    {
        $user = auth()->user();
        $user->load('casilla');

        $notificacion = NotificacionCasilla::where('casilla_electronica_id', $user->casilla->id)
            ->findOrFail($id);

        if (!$notificacion->leido_at) {
            $notificacion->update(['leido_at' => Carbon::now()]);
        }

        return response()->json(['message' => 'Marcada como leída']);
    }
}
