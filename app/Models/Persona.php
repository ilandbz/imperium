<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'dni',
        'ape_pat',
        'ape_mat',
        'primernombre',
        'otrosnombres',
        'fecha_nac',
        'genero',
        'celular',
        'celular2',
        'email',
        'estado_civil',
        'profesion',
        'grado_instr',
        'direccion',
    ];
}
