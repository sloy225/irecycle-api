<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collecteur extends Model
{
    use HasFactory, softDeletes;
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
