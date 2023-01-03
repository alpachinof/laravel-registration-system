<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bank;

class BankController extends Controller
{
    public function index(){
        
        $banks = DB::table('banks')->get();
        return view('bank.list', compact('banks'));
    }

    public function create(){
        return view('bank.create');
    }

    public function store(Request $request){

        bank::create([
            'name' => $request['name'],
            'branch' => $request['branch'],
        ]);

        return redirect()->back()->with('created', true);
    }
}
