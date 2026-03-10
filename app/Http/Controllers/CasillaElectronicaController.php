<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CasillaElectronica\StoreCasillaElectronicaRequest;
use App\Http\Requests\CasillaElectronica\UpdateCasillaElectronicaRequest;
use App\Models\CasillaElectronica;
use App\Models\Persona;
use App\Http\Traits\UserFilters;
use App\Models\TipoCasilla;
use App\Models\User;

class CasillaElectronicaController extends Controller
{
    use UserFilters;
    public function store(StoreCasillaElectronicaRequest $request)
    {

        return DB::transaction(function () use ($request) {
            $filters = $this->getUserFilters();
            $persona = Persona::firstOrCreate(
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

            $tipocasilla = TipoCasilla::where('id', $request->tipo_casilla_id)->first();

            $user = User::firstOrCreate(
                ['dni' => $request->dni],
                [
                    'name'      => $request->dni,
                    'password'  => Hash::make($request->dni),
                    'role_id'   => $tipocasilla->role_id,
                    'es_activo' => 1,
                ]
            );

            $user->roles()->sync([$tipocasilla->role_id]);
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
                'tipo_casilla_id'      => $request->tipo_casilla_id,
                'status'         => $request->status ?? 'pendiente',
                'activated_at'   => $request->activated_at,
                'user_created_id' => $filters['user_id'],
            ]);

            return response()->json([
                'ok' => 1,
                'mensaje' => 'Casilla Electrónica registrada satisfactoriamente'
            ], 200);
        });
    }

    public function show(Request $request)
    {
        $casilla = CasillaElectronica::with('user.persona', 'tipo_casilla')->where('id', $request->id)->first();
        return $casilla;
    }

    public function update(UpdateCasillaElectronicaRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $filters = $this->getUserFilters();

            $casilla = CasillaElectronica::with('user.persona')
                ->where('id', $request->id)
                ->first();

            if (!$casilla) {
                return response()->json([
                    'ok' => 0,
                    'mensaje' => 'Casilla no encontrada'
                ], 404);
            }

            $tipocasilla = TipoCasilla::where('id', $request->tipo_casilla_id)->first();

            if (!$tipocasilla) {
                return response()->json([
                    'ok' => 0,
                    'mensaje' => 'Tipo de casilla no encontrado'
                ], 404);
            }

            $user = $casilla->user;

            if (!$user) {
                return response()->json([
                    'ok' => 0,
                    'mensaje' => 'Usuario no encontrado'
                ], 404);
            }

            // Actualizar o crear persona asociada al usuario
            $persona = $user->persona;

            if ($persona) {
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
            } else {
                $persona = Persona::create([
                    'dni'          => $request->dni,
                    'primernombre' => $request->primernombre,
                    'otrosnombres' => $request->otrosnombres,
                    'ape_pat'      => $request->ape_pat,
                    'ape_mat'      => $request->ape_mat,
                    'celular'      => $request->celular,
                    'email'        => $request->email,
                    'direccion'    => $request->direccion,
                ]);

                $user->persona()->associate($persona);
                $user->save();
            }

            // Actualizar usuario
            $user->update([
                'dni'       => $request->dni,
                'name'      => $request->dni,
                'role_id'   => $tipocasilla->role_id,
                'es_activo' => 1,
            ]);

            $user->roles()->sync([$tipocasilla->role_id]);

            // Actualizar casilla
            $casilla->update([
                'tipo_casilla_id'  => $request->tipo_casilla_id,
                'status'           => $request->status ?? $casilla->status,
                'activated_at'     => $request->activated_at,
                // opcional:
                // 'user_updated_id' => $filters['user_id'],
            ]);

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
        return CasillaElectronica::with([
            'userCreated',
            'user.persona',
            'tipo_casilla'
        ])
            ->whereRaw('UPPER(mailbox_number) LIKE ?', ['%' . $buscar . '%'])
            ->orderBy('mailbox_number', 'ASC')
            ->paginate($paginacion);
    }
}
