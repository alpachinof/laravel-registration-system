<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\course;

class CourseController extends Controller
{
    public function index(){
        
        $courses = DB::table('courses')->get();
        return view('course.list', compact('courses'));
    }

    public function create(){
        $locations = DB::table('locations')->get();
        $lecturers = DB::table('lecturers')->get();
        return view('course.create', compact(['locations','lecturers']));
    }

    public function store(Request $request){
        // $this->validateForm($request);

        course::create([
            'name' => $request['name'],
            'unit' => $request['unit'],
            'weekday' => $request['weekday'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'lecturer_id' => $request['lecturer'],
            'location_id' => $request['location'],
        ]);

        return redirect()->back()->with('created', true);
    }
}
