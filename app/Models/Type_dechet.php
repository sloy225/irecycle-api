<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_dechet extends Model
{
    use HasFactory;
    protected $fillable = [
        'non_type',
        'desc_type',
        'point',
        'active'
    ];
}
