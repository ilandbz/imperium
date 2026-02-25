<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasillaElectronica extends Model
{
    protected $fillable = [
        'user_id',
        'mailbox_number',
        'user_type',
        'status',
        'activated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
