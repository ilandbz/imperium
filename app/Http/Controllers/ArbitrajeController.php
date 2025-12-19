<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ArbitrajeController extends Controller
{

    public function generarPdf(Request $request)
    {
        $data = $request->validate([
            'monto_base'        => 'required|numeric|min:0.01',
            'moneda'            => 'required|in:PEN,USD',
            'tipo_arbitraje'    => 'required|in:unico,tribunal',
            'categoria'         => 'required|in:nacional,internacional',
            'tasa_presentacion' => 'required|numeric',
            'costos_admin'      => 'required|numeric',
            'honorarios'        => 'required|numeric',
            'subtotal'          => 'required|numeric',
            'igv'               => 'required|numeric',
            'total'             => 'required|numeric',
        ]);

        // Para mostrar en el PDF (aquí sí puede llevar "/")
        $data['fecha'] = now()->format('d/m/Y H:i');

        // Para el nombre del archivo, usamos algo sin "/" ni "\"
        $filename = 'costos-arbitraje-'.now()->format('Ymd_His').'.pdf';

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.calculadora_arbitraje', $data)
            ->setPaper('A4', 'portrait');

        return $pdf->download($filename);
        // o si prefieres verlo en el navegador:
        // return $pdf->stream($filename);
    }
}
