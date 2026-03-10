<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCasilla\StoreTipoCasillaRequest;
use App\Http\Requests\TipoCasilla\UpdateTipoCasillaRequest;
use App\Models\TipoCasilla;
use Illuminate\Http\Request;

class TipoCasillaController extends Controller
{
    public function store(StoreTipoCasillaRequest $request)
    {
        $request->validated();
        $tipo = TipoCasilla::create([
            'nombre' => $request->nombre,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo de Casilla Registrado satisfactoriamente'
        ], 200);
    }

    public function show(Request $request)
    {
        $tipo = TipoCasilla::where('id', $request->id)->first();
        return $tipo;
    }

    public function update(UpdateTipoCasillaRequest $request)
    {
        $request->validated();

        $tipo = TipoCasilla::where('id', $request->id)->first();
        $tipo->nombre = $request->nombre;
        $tipo->save();

        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo de Casilla modificado satisfactoriamente'
        ], 200);
    }

    public function destroy(Request $request)
    {
        $tipo = TipoCasilla::where('id', $request->id)->first();
        $tipo->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo de Casilla eliminado satisfactoriamente'
        ], 200);
    }

    public function todos()
    {
        return TipoCasilla::all();
    }

    public function listar(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return TipoCasilla::whereRaw('UPPER(nombre) LIKE ?', ['%' . $buscar . '%'])
            ->paginate($paginacion);
    }
}
