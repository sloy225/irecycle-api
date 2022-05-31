<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_demande',
        'nom_client',
        'prenom_client',
        'mail_client',
        'password_client',
        'contact_client',
        'token_client',
        'points_client',
        'active'
    ];
}
