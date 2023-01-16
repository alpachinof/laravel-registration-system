<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\semester;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(){
        
        $students = DB::table('students')->get();
        return view('student.list', compact('students'));
    }

    public function create(){
        return view('student.create');
    }


    public function store(Request $request){

        $this->validateForm($request);

        $semester = semester::where('current', 1)->first();

        $id = $semester->code . rand ( 10000000000 , 99999999999 );

        $student = new Student([
            'student_id' => $id,
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'national_code' => $request['national_code'],
            'birthdate' => $request['birthdate'],
            'birthplace' => $request['birthplace'],
            'degree' => $request['degree'],
            'address' => $request['address'],
        ]);

        $student->save();
        
        $id = $student->id;

        return redirect('/schedule/create')->with('id', $id);
    }


    public function edit(Request $request, $id){
        $student = Student::where('id', $id)->get();
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id){
        DB::table('students')
            ->where('id', $id)
            ->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'national_code' => $request['national_code'],
                'birthdate' => $request['birthdate'],
                'birthplace' => $request['birthplace'],
                'degree' => $request['degree'],
                'address' => $request['address'],
        ]);

        return redirect('/student')->with('updated', true);
    }


    public function delete(Request $request, $id){
        DB::table('students')->where('id', '=', $id)->delete();
        return redirect('/student')->with('deleted', true);
    }

    public function dailyregister(){

        $courses = DB::table('schedules')
        ->join('courses', 'schedules.course_id', '=', 'courses.id')
        ->select('courses.name', DB::raw("count(schedules.course_id) as count"))
        ->groupBy('schedules.course_id')
        ->whereDate('schedules.created_at', Carbon::today())
        ->get();

        return view('student.daily', compact('courses'));
    }


    public function registerfund(){

        $courses = DB::table('schedules')
        ->join('courses', 'schedules.course_id', '=', 'courses.id')
        ->select('courses.name', DB::raw("count(schedules.course_id) as count"), DB::raw("SUM( courses.price ) AS income"),)
        ->groupBy('schedules.course_id')
        ->get();

        $discount = DB::table('discounts')
        ->whereDate('expiration', '>', Carbon::today())
        ->first('percent');

        return view('student.fund', compact(['courses','discount']));
    }


    protected function validateForm(Request $request){
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'national_code' => ['required','numeric','digits:10'],
            'birthdate' => ['required'],
            'birthplace' => ['required'],
            'degree' => ['required'],
            'address' => ['required'],
        ]);
    }
}
