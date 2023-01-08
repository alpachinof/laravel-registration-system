<?php

namespace App\Http\Controllers;
use App\Models\user_info;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class employee extends Controller
{
    public function create(){
        return view('employee.create');
    }

    public function index(){
        // $infos = user_info::all();
        $infos = user_info::search(request('search'))->paginate();
        return view('employee.list', compact('infos'));
    }
    

    public function filter(Request $request, $role){
        $role = $role;
        $infos = DB::table('users')
        ->join('user_infos', function ($join) use($role) {
            $join->on('users.id', '=', 'user_infos.user_id')
                 ->where('users.role', '=', $role);
        })
        ->get();
        return view('employee.list', compact('infos'));
    }


    public function edit(Request $request, $id){
        $user = user_info::where('user_id', $id)->get();
        return view('employee.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user_id = DB::table('user_infos')->where('id', $id)->first()->user_id;
        DB::table('user_infos')
            ->where('id', $id)
            ->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'birthdate' => $request['birthdate'],
                'birthplace' => $request['birthplace'],
                'degree' => $request['degree'],
                'address' => $request['address'],
                'profile_pic' => $user_id,

        ]);

        if($request->hasFile('profile_pic')){
            //delete old photo
            Storage::delete('public/avatars/' . $user_id);

            //upload new photo
            $path = $request->file('profile_pic')->storeAs(
                'public/avatars', $user_id
            );
        }

        return redirect('/employee')->with('updated', true);
    }
   


    public function store(Request $request){

        $this->validateForm($request);

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
            'profile_pic' => $request->user()->id,
        ]);

        $path = $request->file('profile_pic')->storeAs(
            'public/avatars', $request->user()->id
        );

        return redirect()->route('create')->with('created', true);
        }
        else{

            DB::table('user_infos')
            ->where('user_id', Auth::user()->id)
            ->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'birthdate' => $request['birthdate'],
                'birthplace' => $request['birthplace'],
                'degree' => $request['degree'],
                'address' => $request['address'],
                'profile_pic' => $request->user()->id,
        ]);

        if($request->hasFile('profile_pic')){
            
            //delete old photo
            Storage::delete('public/avatars/'. Auth::user()->id);

            //upload new photo
            $path = $request->file('profile_pic')->storeAs(
                'public/avatars', $request->user()->id
            );
        }

        
            return redirect()->route('create')->with('updated', true);
        }

    }


    public function delete(Request $request, $id){
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('/employee')->with('deleted', true);
    }
    

    protected function validateForm(Request $request){
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'birthdate' => ['required'],
            'birthplace' => ['required'],
            'degree' => ['required'],
            'address' => ['required'],
            'profile_pic' => ['mimes:jpeg,png,jpg,svg','required'],
        ]);
    }
}
