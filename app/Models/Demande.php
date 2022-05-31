<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'id_ramassage',
        'date_prevu',
        'periode_prevu',
        'point_recuperation',
        'active'
    ];
}
