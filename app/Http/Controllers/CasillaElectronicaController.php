<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CasillaElectronica\StoreCasillaElectronicaRequest;
use App\Http\Requests\CasillaElectronica\UpdateCasillaElectronicaRequest;
use App\Models\CasillaElectronica;

class CasillaElectronicaController extends Controller
{
    public function store(StoreCasillaElectronicaRequest $request)
    {
        return \DB::transaction(function () use ($request) {
            $persona = \App\Models\Persona::firstOrCreate(
                ['dni' => $request->dni],
                [
                    'primernombre' => $request->primernombre,
                    'otrosnombres' => $request->otrosnombres,
                    'ape_pat'      => $request->ape_pat,
                    'ape_mat'      => $request->ape_mat,
                    'celular'      => $request->celular,
                    'email'        => $request->email,
                    'direccion'    => $request->direccion,
                ]
            );

            $user = \App\Models\User::firstOrCreate(
                ['dni' => $request->dni],
                [
                    'name'      => $request->dni,
                    'password'  => \Hash::make($request->dni),
                    'es_activo' => 1,
                ]
            );

            // Autogenerate mailbox_number: date(day) + date(min+sec) + rand(2 digits) = 8 digits
            $mailboxNumber = '';
            $exists = true;
            while ($exists) {
                // d (2) + i (2) + s (2) + rand (2) = 8 digits
                $mailboxNumber = date('d') . date('is') . str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
                $exists = CasillaElectronica::where('mailbox_number', $mailboxNumber)->exists();
            }

            $casilla = CasillaElectronica::create([
                'user_id'        => $user->id,
                'mailbox_number' => $mailboxNumber,
                'user_type'      => $request->user_type,
                'status'         => $request->status ?? 'pendiente',
                'activated_at'   => $request->activated_at,
            ]);

            return response()->json([
                'ok' => 1,
                'mensaje' => 'Casilla Electrónica registrada satisfactoriamente'
            ], 200);
        });
    }

    public function show(Request $request)
    {
        $casilla = CasillaElectronica::with('user.persona')->where('id', $request->id)->first();
        return $casilla;
    }

    public function update(UpdateCasillaElectronicaRequest $request)
    {
        return \DB::transaction(function () use ($request) {
            $casilla = CasillaElectronica::with('user.persona')->where('id', $request->id)->first();

            if (!$casilla) {
                return response()->json(['ok' => 0, 'mensaje' => 'Casilla no encontrada'], 404);
            }

            // Update Persona
            $persona = $casilla->user->persona;
            $persona->update([
                'dni'          => $request->dni,
                'primernombre' => $request->primernombre,
                'otrosnombres' => $request->otrosnombres,
                'ape_pat'      => $request->ape_pat,
                'ape_mat'      => $request->ape_mat,
                'celular'      => $request->celular,
                'email'        => $request->email,
                'direccion'    => $request->direccion,
            ]);

            // Update User DNI if changed (though name is often used as username)
            $user = $casilla->user;
            $user->update(['dni' => $request->dni]);

            // Update Casilla
            $casilla->mailbox_number = $request->mailbox_number;
            $casilla->user_type      = $request->user_type;
            $casilla->status         = $request->status;
            $casilla->activated_at   = $request->activated_at;
            $casilla->save();

            return response()->json([
                'ok' => 1,
                'mensaje' => 'Casilla Electrónica modificada satisfactoriamente'
            ], 200);
        });
    }

    public function destroy(Request $request)
    {
        $casilla = CasillaElectronica::where('id', $request->id)->first();
        $casilla->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Casilla Electrónica eliminada satisfactoriamente'
        ], 200);
    }

    public function todos()
    {
        $casillas = CasillaElectronica::orderBy('mailbox_number', 'ASC')->get();
        return $casillas;
    }

    public function listar(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return CasillaElectronica::whereRaw('UPPER(mailbox_number) LIKE ?', ['%' . $buscar . '%'])
            ->orderBy('mailbox_number', 'ASC')
            ->paginate($paginacion);
    }
}
