<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function signup(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'email' => 'required|max:255|max:255|unique:users',
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
            $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Your account has been Created Successfully !!', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }

    public function  login(Request $request)
    {

        $validators = Validator::make($request->all(), [
            'email' => 'required|max:255|max:255|',
            'password' => 'required|min:6'
        ]);
        if ($validators->passes()) {
            $user = User::where(['email' => $request->email])->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                $response = response()->json(['status' => 'false', 'message' => ' Email or Password Incorrect !! ', 'code' => 409]);
            } else {
                $response = response()->json(['status' => 'true', 'message' => ' Login Successfully  !!', 'code' => 201]);
            }
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'code' => 201]);
        }

        return $response;
    }


    public function update(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|alpha',
            'email' => 'required|max:255|max:255|unique:users',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
        ]);
        if ($validators->passes()) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->save();
            $response = response()->json(['status' => 'true', 'message' => ' User Update Successfully', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }



    public function delete(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validators->fails()) {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        } else {
            $user = User::find($request->id);
            if ($user) {
                $user = User::find($request->id)->delete();
                $response = response()->json(['status' => 'false', 'message' => " User Delete Successfully !!", 'status' => 201]);
            } else {
                $response = response()->json(['status' => 'false', 'message' => " User Does not exist ", 'status' => 404]);
            }
        }
        return $response;
    }

    public function users()
    {
        $user=User::all();
        if(!$user){
            $response = response()->json(['status' => 'true', 'message' => " The Table is Empty !!", 'status' => 201]);
        }else{
            $response = response()->json(['status' => 'true', 'message' => " All User Details !!", 'status' => 201]);
        }
        // return $user;
        return $response;

    }

}
