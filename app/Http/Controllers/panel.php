<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;


class panel extends Controller
{
    public function index(){
        $admins = User::where('role', 1)->count();
        $registerusers = User::where('role', 0)->count();
        $officeusers = User::where('role', 2)->count();
        $students = Student::all()->count();
        return view('welcome', compact(['admins','registerusers','officeusers','students']));
    }
}
