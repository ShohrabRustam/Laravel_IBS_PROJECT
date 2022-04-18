<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeskboardCommonController extends Controller
{
    //
    public function _index()
    {
        return view('Users.home');
    }

    public function _contact(){
        return view('Users.contact');
    }

    public function _about(){
        return view('Users.about');
    }

    public function _help()
    {
        return view('Users.help');
    }

    public function _signup(){
        return view('Users.signup');
    }

    public function _login(){
        return view('Users.login');
    }

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

}
