<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        
        $locations = DB::table('locations')->get();
        return view('location.list', compact('locations'));
    }

    public function create(){
        return view('location.create');
    }

    public function store(Request $request){


        $this->validateForm($request);

        location::create([
            'site' => $request['site'],
            'room' => $request['room'],
        ]);

        return redirect()->back()->with('created', true);
    }


    protected function validateForm(Request $request){
        $request->validate([
            'site' => ['required'],
            'room' => ['required','numeric','digits:3'],

        ]);
    }
}
