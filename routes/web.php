<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\employee;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\panel;



Route::middleware('auth')->controller(panel::class)->group(function () {
    Route::get('/', 'index');
});

 
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


Route::middleware('auth')->prefix('employee')->controller(employee::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'edit');
    Route::post('/{id}', 'update');
    Route::get('/delete/{id}', 'delete')->name('delete');

});

Route::middleware('auth')->prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/{id}', 'edit');
    Route::post('/{id}', 'update');
    Route::get('/delete/{id}', 'delete');

});

Route::middleware('auth')->prefix('lecturer')->controller(LecturerController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    // Route::get('/{id}', 'edit');
    // Route::post('/{id}', 'update');
    // Route::get('/delete/{id}', 'delete')->name('delete');

});