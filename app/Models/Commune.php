<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'nom_commune',
        'active'
    ];
}
