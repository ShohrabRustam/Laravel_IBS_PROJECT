<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function signup(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required|alpha',
            'email'=>'required',
            'mobile'=>'required|min:10|max:13',
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password|min:6'
        ]);
        if($validators->passes()){
            print_r($request->all());
        }
        else{
            print_r($validators->errors()->all());
        }
    }
}
