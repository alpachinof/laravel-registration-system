<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\lecturer;
use Illuminate\Http\Request;


class panel extends Controller
{
    public function index(){

        $admins = User::where('role', 1)->count();
        $registerusers = User::where('role', 0)->count();
        $officeusers = User::where('role', 2)->count();
        $students = Student::all()->count();
        $courses = lecturer::withCount('courses')->get();
        return view('welcome', compact(['admins','registerusers','officeusers','students','courses']));
    }
}
