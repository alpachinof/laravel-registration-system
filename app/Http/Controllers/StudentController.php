<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        
        $students = DB::table('students')->get();
        return view('student.list', compact('students'));
    }
}
