<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCasilla extends Model
{
    protected $fillable = [
        'nombre',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
