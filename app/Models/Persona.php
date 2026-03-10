<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
    protected $appends = ['apenom'];
    public function apenom(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => "{$attributes['ape_pat']} {$attributes['ape_mat']} {$attributes['primernombre']} " . ($attributes['otrosnombres'] ?? ''),
        );
    }
}
