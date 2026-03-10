<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacionCasilla extends Model
{
    protected $table = 'notificaciones_casilla';

    protected $fillable = [
        'casilla_electronica_id',
        'expediente_id',
        'numero_notificacion',
        'asunto',
        'mensaje',
        'tipo',
        'documento_path',
        'leido_at',
        'user_created_id'
    ];

    protected $dates = ['leido_at'];

    public function casilla()
    {
        return $this->belongsTo(CasillaElectronica::class, 'casilla_electronica_id');
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }
}
