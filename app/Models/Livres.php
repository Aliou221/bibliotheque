<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livres extends Model
{
    protected $fillable = [
        'titre',
        'auteur',
        'code',
        'categorie',
        'date_publication',
        'estDisponible',
    ];
}
