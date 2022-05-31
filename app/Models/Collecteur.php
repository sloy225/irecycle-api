<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collecteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_collecteur',
        'prenom_collecteur',
        'mail_collecteur',
        'password_collecteur',
        'token_collecteur',
        'contact_collecteur',
        'immatriculation',
        'active'
    ];
}
