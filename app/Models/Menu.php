<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $fillable = ['id', 'nombre', 'slug', 'icono', 'grupo_menu_id'];
    public $timestamps = false;
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
    public function grupo(): BelongsTo
    {
        return $this->belongsTo(GrupoMenu::class, 'grupo_menu_id');
    }
}
