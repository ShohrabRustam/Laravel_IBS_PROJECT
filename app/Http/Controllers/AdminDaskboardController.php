<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDaskboardController extends Controller
{
    //
    public function _index(){
        return view('Admin.home');
    }
}
