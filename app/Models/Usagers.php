<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usagers extends Model
{
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'phone',
        'adresse',
    ];
}
