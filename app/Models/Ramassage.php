<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ramassage extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'id_collecteur',
        'deta_ramassage',
        'coordonnes',
        'total_point',
        'statut',
        'active'
    ];
}
