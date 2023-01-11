<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\discount;
use App\Models\transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // public function index(){
        
    //     // $students = DB::table('students')->get();
    //     return view('student.list', compact('students'));
    // }

    public function create(){

        $discounts = DB::table('discounts')->get();
        $banks = DB::table('banks')->get();

        return view('transaction.create', compact(['discounts','banks']));
    }

    public function store(Request $request, $id){

        transaction::create([
            'student_id' => $id,
            'type' => $request['type'],
            'amount' => $request['amount'],
            'debt' => $request['amount'] - $request['debt'],
            'origin_bank_id' => $request['origin_bank_id'],
            'destination_bank_id' => $request['destination_bank_id'],
            'due_date' => $request['due_date']? $request['due_date'] : null,

        ]);

        return redirect('/')->with('created', true);
    }
}
