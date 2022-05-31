<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ramassage',
        'date_prevu',
        'periode_prevu',
        'point_recuperation',
        'active'
    ];
}
