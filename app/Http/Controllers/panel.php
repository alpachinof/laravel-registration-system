<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class panel extends Controller
{
    public function index(){

        $admins = User::where('role', 1)->count();
        $registerusers = User::where('role', 0)->count();
        $officeusers = User::where('role', 2)->count();
        $students = Student::all()->count();
        $courses = lecturer::withCount('courses')->get();

        $studentpercourses = DB::table('schedules')
        ->join('courses', 'schedules.course_id', '=', 'courses.id')
        ->select('courses.name as name', DB::raw("count(schedules.course_id) as count"))
        ->groupBy('schedules.course_id')
        ->get();

        $studentpersemesters = DB::table('schedules')
        ->join('courses', 'schedules.course_id', '=', 'courses.id')
        ->join('semesters', 'courses.semester_id', '=', 'semesters.id')
        ->select('semesters.code', DB::raw("count(DISTINCT schedules.student_id) as count"))
        ->groupBy('courses.semester_id')
        ->get();

        $income = DB::table('transactions')
        ->select( DB::raw("sum(transactions.amount) as income"))
        ->get();
        
        $expense = DB::table('lecturers')
        ->select( DB::raw("sum(lecturers.salary) as expense"))
        ->get();
       

        return view('welcome', compact([
            'admins',
            'registerusers',
            'officeusers',
            'students',
            'courses',
            'studentpercourses',
            'studentpersemesters',
            'income',
            'expense'
        ]));
    }
}
