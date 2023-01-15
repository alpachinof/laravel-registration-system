<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered;

class LoginController extends Controller
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




    public function showLoginForm(){
        return view('auth.login');
    }


    public function Login(Request $request){
        //validate data
        $this->validateForm($request);

        if($this->AttemptLogin($request)){
            
            return redirect('')->with('success',true);
        }
        return redirect('/login')->with('WrongCredential', true);

    }


    protected function validateForm(Request $request){
        $request->validate([
            'username' => ['required','exists:users'],
            'password' => ['required']
        ]);
    }

    protected function AttemptLogin(Request $request){
        return Auth::attempt($request->only('username','password'));
    }
}