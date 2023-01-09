<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\semester;
use App\Models\schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function create(){
        
        $semester = semester::where('current', 1)->first();

        $courses = DB::table('courses')
        ->join('lecturers', function ($join) use($semester) {
            $join->on('lecturer_id', '=', 'lecturers.id')
                 ->where('semester_id', '=', $semester->id);
        })
        ->select('courses.*','lecturers.firstname','lecturers.lastname')
        ->get();

        return view('schedule.create', compact('courses'));
    }


    public function store(Request $request, $id){
        $courses = $request->input('checkbox');
        foreach($courses as $course){
            schedule::create([
                    'student_id' => $id,
                    'course_id' => $course,
                ]);
           }
        // discount::create([
        //     'name' => $request['name'],
        //     'percent' => $request['percent'],
        //     'expiration' => $request['expiration'],

        // ]);

        // return redirect()->back()->with('created', true);
    }
}
