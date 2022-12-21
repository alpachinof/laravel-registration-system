<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'role',
        'national_code',
        'birthdate',
        'degree',
        'address',
    ];
}
