<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(){
        
        $semesters = DB::table('semesters')->get();
        return view('semester.list', compact('semesters'));
    }

    public function create(){
        return view('semester.create');
    }

    public function store(Request $request){

        $this->validateForm($request);

        $code = substr($request['year'], 2 ) . $request['semester'];

        semester::create([
            'year' => $request['year'],
            'semester' => $request['semester'],
            'code' => $code,
            'current' => false
        ]);

        return redirect()->back()->with('created', true);
    }


    public function edit(Request $request, $id){
        $semester = semester::where('id', $id)->get();
        return view('semester.edit', compact('semester'));
    }

    public function update(Request $request, $id){
        DB::table('semesters')
            ->where('id', $id)
            ->update([
                'year' => $request['year'],
                'semester' => $request['semester'],
                'current' => $request['current']? 1 : 0,
        ]);

        return redirect('/semester')->with('updated', true);
    }


    protected function validateForm(Request $request){
        $request->validate([
            'year' => ['required','numeric','digits:4'],
            'semester' => ['required'],
        ]);
    }
}
