<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_dechet extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'non_type',
        'desc_type',
        'point',
        'active'
    ];
}
