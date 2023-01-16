<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transaction;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function debt(){

        $debts = DB::table('transactions')
        ->join('students', 'transactions.student_id', '=', 'students.id')
        ->select('students.firstname','students.lastname','students.student_id', DB::raw("SUM( transactions.debt ) AS debt"))
        ->groupBy('transactions.student_id')
        ->where('debt', '>', '0')
        ->get();

        return view('report.debt', compact('debts'));
    }

    public function cheque(){

        $cheques = DB::table('transactions')
        ->join('students', 'transactions.student_id', '=', 'students.id')
        ->select('students.firstname','students.lastname','students.student_id','transactions.debt','transactions.due_date')
        ->where('type', '=', 'چک')->whereBetween('due_date', [request('start'), request('end')])
        ->get();

        return view('report.cheque', compact('cheques'));
    }

    public function lecturer(){

        $balances = DB::table('courses')
        ->join('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
        ->join('schedules', 'courses.id', '=', 'schedules.course_id')
        ->select('lecturers.firstname','lecturers.lastname','lecturers.salary', DB::raw("SUM( courses.price ) AS income"))
        ->groupBy('courses.lecturer_id')
        ->get();

        $discount = DB::table('discounts')
        ->whereDate('expiration', '>', Carbon::today())
        ->first('percent');


        return view('report.lecturer', compact(['balances','discount']));
    }
}
