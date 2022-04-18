<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeskboardCommonController extends Controller
{
    //
    public function index()
    {
        return view('Users.home');
    }

    public function contact(){
        return view('Users.contact');
    }

    public function about(){
        return view('Users.about');
    }
}
