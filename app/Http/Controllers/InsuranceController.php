<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    public function _bike(){
        return view('Users.bikeInsurance');
    }

    public function _car(){
        return view('Users.carInsurance');
    }

    public function _life(){
        return view('Users.healthInsurance');
    }

    public function _health(){
        return view('Users.lifeInsurance');
    }
    //
}
