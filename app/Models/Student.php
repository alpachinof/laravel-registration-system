<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'national_code',
        'birthdate',
        'birthplace',
        'degree',
        'address',
    ];

    public function schedule()
    {
        return $this->hasMany(schedule::class);
    }
}
