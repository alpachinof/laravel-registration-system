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
            if(Auth::user()->role == 1){
                return redirect('/dashboard');
            }
            return redirect('');
        }
        return redirect('/login');

        
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