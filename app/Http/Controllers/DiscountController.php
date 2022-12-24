<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\discount;

class DiscountController extends Controller
{
    public function index(){
        
        $discounts = DB::table('discounts')->get();
        return view('discount.list', compact('discounts'));
    }

    public function create(){
        return view('discount.create');
    }

    public function store(Request $request){

        $this->validateForm($request);

        discount::create([
            'name' => $request['name'],
            'percent' => $request['percent'],
            'expiration' => $request['expiration'],

        ]);

        return redirect()->back()->with('created', true);
    }


    public function edit(Request $request, $id){
        $discount = discount::where('id', $id)->get();
        return view('discount.edit', compact('discount'));
    }

    public function update(Request $request, $id){
        DB::table('discounts')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'percent' => $request['percent'],
                'expiration' => $request['expiration'],
        ]);

        return redirect('/discount')->with('updated', true);
    }


    protected function validateForm(Request $request){
        $request->validate([
            'name' => ['required'],
            'percent' => ['required','numeric','max:100'],
            'expiration' => ['required'],
        ]);
    }
}
