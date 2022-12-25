<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class CourseController extends Controller
{
    public function index(){
        
        // $discounts = DB::table('discounts')->get();
        // return view('discount.list', compact('discounts'));

        course::create([
            'name' => 'ارزش های دفاع مقدس',
            'unit' => 2,
            'weekday' => 'دوشنبه',
            'start_time' => '14:30',
            'end_time' => '16:30',
            'lecturer_id' => 1,
            'location_id' => 1,

        ]);
    }
}
