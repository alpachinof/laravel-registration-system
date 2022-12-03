<?php

namespace App\Http\Controllers;
use App\Models\user_info;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employee extends Controller
{
    public function registerInfo(){
        return view('employee.registerInfo');
    }

    public function employeeList(){
        return view('employee.employeeList');
    }


    // public function create(array $data){

    //     $user = User::has('info')->get()->first();
    //     if ($user === null){
    //         user_info::create([
    //         'user_id' => Auth::user()->id,
    //         'firstname' => $data['firstname'],
    //         'lastname' => $data['lastname'],
    //         'birthdate' => $data['birthdate'],
    //         'birthplace' => $data['birthplace'],
    //         'degree' => $data['degree'],
    //         'address' => $data['address'],
    //         'profile_pic' => $data['profile_pic'],
    //     ]);
    //     return redirect()->route('registerinfo')->with('registered', true);
    //     }
    //     else{
    //         return redirect()->route('registerinfo')->with('failed', true);
    //     }
    // }

    public function registerInformation(Request $request){

        $user = User::has('info')->get()->first();
        if ($user === null){
            user_info::create([
            'user_id' => Auth::user()->id,
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'birthdate' => $request['birthdate'],
            'birthplace' => $request['birthplace'],
            'degree' => $request['degree'],
            'address' => $request['address'],
            'profile_pic' => $request['profile_pic'],
        ]);
        return redirect()->route('registerinfo')->with('registered', true);
        }
        else{
            return redirect()->route('registerinfo')->with('failed', true);
        }
    }
}
