<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasillaElectronica;
use App\Models\NotificacionCasilla;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CasillaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        // Cargar persona y su casilla electrónica
        $user->load('persona', 'casilla');

        $casilla = $user->casilla;

        if (!$casilla) {
            return response()->json([
                'error' => 'No tienes una casilla electrónica asignada.'
            ], 404);
        }

        // Consulta de notificaciones para esta casilla
        $notificacionesQuery = NotificacionCasilla::where('casilla_electronica_id', $casilla->id);

        // Estadísticas Reales
        $stats = [
            'noLeidos' => (clone $notificacionesQuery)->whereNull('leido_at')->count(),
            'pendientesAtencion' => (clone $notificacionesQuery)->where('tipo', 'Requerimiento')->whereNull('leido_at')->count(),
            'pronunciamientosMes' => (clone $notificacionesQuery)->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count(),
            'vencenHoy' => 0,
        ];

        // Notificaciones Recientes Reales
        $recientes = (clone $notificacionesQuery)
            ->with('expediente')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($notif) {
                return [
                    'id' => $notif->id,
                    'fecha' => $notif->created_at->format('d/m/Y'),
                    'hora' => $notif->created_at->format('H:i'),
                    'tipo' => $notif->tipo,
                    'asunto' => $notif->asunto,
                    'estado' => $notif->leido_at ? 'Leído' : 'Nuevo',
                    'documento_url' => $notif->documento_path,
                ];
            });

        // Alertas de plazos (Vacío por ahora)
        $alertas = [];

        return response()->json([
            'user' => [
                'name' => $user->persona ? $user->persona->apenom : $user->name,
                'mailbox_number' => $casilla->mailbox_number,
                'status' => strtoupper($casilla->status),
                'last_access' => Carbon::now()->format('d/m/Y H:i'),
            ],
            'stats' => $stats,
            'recientes' => $recientes,
            'alertas' => $alertas,
        ]);
    }
}
