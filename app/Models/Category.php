<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Relación con los juegos.
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
