<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasillaElectronica extends Model
{
    protected $fillable = [
        'user_id',
        'mailbox_number',
        'tipo_casilla_id',
        'status',
        'activated_at',
        'user_created_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo_casilla()
    {
        return $this->belongsTo(TipoCasilla::class);
    }

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }
}
