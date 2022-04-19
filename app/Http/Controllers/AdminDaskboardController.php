<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AdminDaskboardController extends Controller
{
    //
    public function _index()
    {
        if((Session::has('user')) && ((Session::has('user')['type']=='superadmin') ||(Session::has('user')['type']==='admin'))){
        return view('Admin.home');
        }else{
            return redirect('adminLogin');
        }
    }

    public function _login()
    {
        return view('Admin.login');
    }

    public function _addCompany(){
        if((Session::has('user')) && ((Session::has('user')['type']==='superadmin') ||(Session::has('user')['type']==='admin'))){
        return view('Admin.company');
        }
        else{
            return redirect('adminLogin');
        }
    }


    public function _request()
    {
        if((Session::has('user')) && ((Session::has('user')['type']==='superadmin') ||(Session::has('user')['type']==='admin'))){
        return view('Admin.request');
        }else{
            return redirect('adminLogin');
        }
    }


    public function _claim(){
        if((Session::has('user')) && ((Session::has('user')['type']==='superadmin') ||(Session::has('user')['type']==='admin'))){
        return view('Admin.claim');
        }
        else{
            return redirect('adminLogin');
        }
    }

    public function _homeSuperadmin()
    {
        return view('SuperAdmin.home');
    }

    public function _users(){
        // if(Session::has('user') && (Session::has('user')['type']==='superadmin')){
        return view('SuperAdmin.users');


    }

    public function _admins(){
        return view('SuperAdmin.admins');

    }

    public function _loginSuperadmin(){
        return view('SuperAdmin.login');
    }

    public function _signupAdmin(){
        if(Session::has('user') && (Session::has('user')['type']==='superadmin')){
        return view('SuperAdmin.signupAdmin');
        }
        else{
            return redirect('/superAdminLogin');
        }
    }
}
