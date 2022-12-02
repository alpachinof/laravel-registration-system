<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employee extends Controller
{
    public function registerInfo(){
        return view('employee.registerInfo');
    }

    public function employeeList(){
        return view('employee.employeeList');
    }
}
