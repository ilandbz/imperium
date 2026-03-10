<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'codigo',
        'ano',
        'titulo',
        'materia',
        'demandante',
        'demandado',
        'cuantia',
        'estado',
        'user_created_id'
    ];

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function notificaciones()
    {
        return $this->hasMany(NotificacionCasilla::class);
    }
}
