<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
class UserController extends Controller
{
    //
    public function signup(Request $request){
        $user = new User();
        $validators=Validator::make($request->all(),[
            'name'=>'required|alpha',
            'email'=>'required',
            'mobile'=>'required|min:6000000000|max:9999999999|numeric',
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
