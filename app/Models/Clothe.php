<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clothe extends Model
{
    use SoftDeletes;

    // IMPORTANTE: Specifica il nome della tabella
    protected $table = 'clothes';

    protected $fillable = [
        'name',
        'description',
        'price',
        'brand',
        'category',
        'material',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Relazione con le immagini
    public function images()
    {
        return $this->hasMany(ClothImage::class, 'clothe_id');
    }

    // Immagine principale
    public function primaryImage()
    {
        return $this->hasOne(ClothImage::class, 'clothe_id')->where('is_primary', true);
    }

    // Scope per filtrare per categoria
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
