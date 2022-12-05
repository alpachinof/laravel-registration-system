<?php

namespace App\Http\Controllers;
use App\Models\user_info;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employee extends Controller
{
    public function registerInfo(){
        return view('employee.registerInfo');
    }

    public function index(){
        // $infos = user_info::all();
        $infos = user_info::search(request('search'))->paginate();
        return view('employee.list', compact('infos'));
    }

    public function edit(Request $request, $id){
        $user = user_info::where('user_id', $id)->get();
        return view('employee.edit', compact('user'));
    }

    public function update(Request $request, $id){

        DB::table('user_infos')
            ->where('id', $id)
            ->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'birthdate' => $request['birthdate'],
                'birthplace' => $request['birthplace'],
                'degree' => $request['degree'],
                'address' => $request['address'],
                'profile_pic' => $request['profile_pic'],
        ]);

        return redirect('employee');
    }

    public function delete(Request $request, $id){
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('employee');
    }
    


    public function registerInformation(Request $request){

        $user = Auth::User();
        if (! $user->info()->where('user_id', $user->id)->exists()){
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
