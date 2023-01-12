<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transaction;


class ReportController extends Controller
{
    public function debt(){

        $debts = DB::table('transactions')
        ->join('students', 'transactions.student_id', '=', 'students.id')
        ->select('students.firstname','students.lastname','students.student_id', DB::raw("SUM( transactions.debt ) AS debt"))
        ->groupBy('transactions.student_id')
        ->get();

        return view('report.debt', compact('debts'));
    }

    public function cheque(){

        $cheques = DB::table('transactions')
        ->join('students', 'transactions.student_id', '=', 'students.id')
        ->select('students.firstname','students.lastname','students.student_id','transactions.debt','transactions.due_date')
        ->groupBy('schedules.course_id')
        ->whereDate('created_at', Carbon::today())
        ->get();

        dd($cheques);

        // return view('report.cheque', compact('cheques'));
    }
}
