<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered;

class RegisterController extends Controller
{


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function create(array $data){

        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            
        ]);
    }


    public function showRegistrationForm(){
        return view('auth.register');
    }


    public function Register(Request $request){
        //validate data
        $this->validateForm($request);

        //create user 
        $user = $this->create($request->all());

        
    }


    protected function validateForm(Request $request){
        $request->validate([
            'username' => ['required','numeric','digits:10'],
            'password' => ['required','string','min:8']
        ]);
    }

}