<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image', 'url_trailer', 'category_id']; // Campos que se pueden llenar

    /**
     * Relación con la categoría.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación con las calificaciones.
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
