<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function signup(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'email' => 'required',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        if ($validators->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->save();
            $arr = "{'status'=>true,'message'=>'Congratulations! Your account has been Created Successfully !!.','code'=>201}";
        } else {
            print_r($validators->errors()->all());
            $arr = "{'status'=>false,'message'=>$validators->errors()->all,'code'=>108}";
        }
        echo json_decode($arr);
    }
}
