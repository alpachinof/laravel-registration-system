<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\lecturer;
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
            'national_code' => $request['national_code'],
            'birthdate' => $request['birthdate'],
            'degree' => $request['degree'],
            'address' => $request['address'],
        ]);

        return redirect()->back()->with('created', true);
    }

    protected function validateForm(Request $request){
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'role' => ['required'],
            'national_code' => ['required','numeric','digits:10'],
            'birthdate' => ['required'],
            'degree' => ['required'],
            'address' => ['required'],
        ]);
    }
}
