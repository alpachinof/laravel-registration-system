<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'price',
        'weekday',
        'start_time',
        'end_time',
        'lecturer_id',
        'location_id',
        'semester_id',
    ];

    public function lecturer()
    {
        return $this->belongsTo(lecturer::class);
    }
}
