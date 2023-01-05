<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\lecturer;
use App\Models\course;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index(){
        
        $lecturers = DB::table('lecturers')->get();
        return view('lecturer.list', compact('lecturers'));
    }

    public function create(){
        return view('lecturer.create');
    }

    public function store(Request $request){

        $this->validateForm($request);

        lecturer::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'role' => $request['role'],
            'salary' => $request['salary'],
            'national_code' => $request['national_code'],
            'birthdate' => $request['birthdate'],
            'degree' => $request['degree'],
            'address' => $request['address'],
        ]);

        return redirect()->back()->with('created', true);
    }

    public function courses(Request $request, $id){
        $courses = course::where('lecturer_id', $id)->get();
        return view('course.list', compact('courses'));
    }

    protected function validateForm(Request $request){
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'role' => ['required'],
            'salary' => ['numeric'],
            'national_code' => ['required','numeric','digits:10'],
            'birthdate' => ['required'],
            'degree' => ['required'],
            'address' => ['required'],
        ]);
    }
}
