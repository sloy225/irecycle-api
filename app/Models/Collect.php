<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collect extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'id_ramassage',
        'id_type',
        'poids_collect',
        'active'
    ];
}
