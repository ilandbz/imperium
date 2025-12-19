<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot (campo oculto debe venir vacío)
        if ($request->filled('website')) {
            return back()->with('error', 'Spam detectado.');
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'min:3'],
            'email'   => ['required', 'email'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        // Envía correo simple (usa tu correo de destino)
        $to = config('mail.from.address') ?: 'contacto@tu-dominio.com';

        $body  = "Nuevo mensaje desde el portal\n\n";
        $body .= "Nombre: {$data['name']}\n";
        $body .= "Email: {$data['email']}\n";
        $body .= "Teléfono: ".($data['phone'] ?? '—')."\n\n";
        $body .= "Mensaje:\n{$data['message']}\n";

        Mail::raw($body, function ($m) use ($to, $data) {
            $m->to($to)
              ->subject('Contacto web — '.$data['name'])
              ->replyTo($data['email']);
        });

        return back()->with('success', '¡Gracias! Te responderemos pronto.');
    }
}
