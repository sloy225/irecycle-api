<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ramassage',
        'id_type',
        'poids_collect',
        'active'
    ];
}
