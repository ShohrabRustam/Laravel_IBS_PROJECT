<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDaskboardController extends Controller
{
    //
    public function _index(){
        return view('Admin.home');
    }

    public function _login(){
        return view('Admin.login');
    }

    public function _addCompany(){
        return view('Admin.company');
    }


    public function _request(){
        return view('Admin.request');
    }


    public function _claim(){
        return view('Admin.claim');
    }
}
