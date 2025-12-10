<?php
// filepath: c:\Users\User\wa\macri\app\Models\ClothImage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ClothImage extends Model
{
    protected $fillable = [
        'clothe_id',
        'path',
        'filename',
        'is_primary'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // Accessor per l'URL completo
    public function getUrlAttribute()
    {
        // Se path è già un URL completo (inizia con http/https), ritornalo direttamente
        if (str_starts_with($this->path, 'http://') || str_starts_with($this->path, 'https://')) {
            return $this->path;
        }

        // Altrimenti costruisci l'URL da storage locale
        return asset('storage/' . $this->path);
    }

    public function clothe()
    {
        return $this->belongsTo(Clothe::class);
    }
}

