<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'is_active'];

    // Se la tabella ha un nome diverso, specifica:
    protected $table = 'newsletter_subscribers';
}
