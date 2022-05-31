<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_role',
        'nom_admin',
        'prenom_admin',
        'mail_admin',
        'password_admin',
        'token_admin',
        'active'
    ];
}
