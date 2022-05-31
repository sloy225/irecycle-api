<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role_permission extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'id_role',
        'id_permission',
        'active'
    ];
}
