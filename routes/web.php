<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

 
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'Register');
});


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'Login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->middleware('auth')->name('logout');


Route::get('dashboard',function(){
    return view('dashboard');
})->middleware(['auth','admin']);


Route::prefix('employee')->controller(employee::class)->group(function () {
    Route::get('/registerinfo', 'registerInfo');
    Route::get('/all', 'employeeList');
});