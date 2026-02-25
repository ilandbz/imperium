<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoMenu\StoreGrupoMenuRequest;
use App\Http\Requests\GrupoMenu\UpdateGrupoMenuRequest;
use App\Models\GrupoMenu;
use Illuminate\Http\Request;

class GrupoMenuController extends Controller
{
    public function store(StoreGrupoMenuRequest $request)
    {
        $grupo = GrupoMenu::create([
            'titulo'    => $request->titulo,
        ]);

        return response()->json([
            'ok' => 1,
            'mensaje' => 'Grupo Menu Registrado satisfactoriamente'
        ], 200);
    }

    public function show(Request $request)
    {
        $grupo = GrupoMenu::where('id', $request->id)->first();
        return $grupo;
    }

    public function update(UpdateGrupoMenuRequest $request)
    {

        $grupo = GrupoMenu::where('id', $request->id)->first();

        $grupo->titulo           = $request->titulo;
        $grupo->save();

        return response()->json([
            'ok' => 1,
            'mensaje' => 'Grupo Menu modificado satisfactoriamente'
        ], 200);
    }

    public function destroy(Request $request)
    {
        $grupo = GrupoMenu::where('id', $request->id)->first();
        $grupo->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Grupo Menu eliminado satisfactoriamente'
        ], 200);
    }

    public function todos()
    {
        $grupos = GrupoMenu::orderBy('titulo', 'ASC')->get();
        return $grupos;
    }
    public function listar(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return GrupoMenu::whereRaw('UPPER(titulo) LIKE ?', ['%' . $buscar . '%'])
            ->orderBy('titulo', 'ASC')
            ->paginate($paginacion);
    }
}
