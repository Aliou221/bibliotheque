<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunts extends Model
{
    protected $fillable = [
        'id_livre',
        'id_user',
        'date_emprunt',
        'date_retoure',
        'estEncours',
        'estRetourne',
    ];
}
