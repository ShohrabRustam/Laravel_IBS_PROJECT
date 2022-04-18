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

    public function _homeSuperadmin(){
        return view('SuperAdmin.home');
    }

    public function _users(){
        return view('SuperAdmin.users');
    }

    public function _admins(){
        return view('SuperAdmin.admins');
    }

    public function _loginSuperadmin(){
        return view('SuperAdmin.login');
    }

    public function _signupAdmin(){
        return view('SuperAdmin.signupAdmin');
    }
}
