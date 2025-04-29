<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clothe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'size',
        'color',
        'price',
        'cover',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
