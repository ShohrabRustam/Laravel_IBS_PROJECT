<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;


class UserController extends Controller
{
    public function _signup(Request $request)
    {
        $validators = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255|unique:users',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $response = $user->save();
            if($response){
                return back()->with('success','You have Registered Successfully !!!');
            }
            else{
                return back()->with('fail','Ohooo .. Something Wrong !!');
            }

          }

    public function  _login(Request $request)
    {

        $validators =$request->validate( [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
            $user = User::where(['email' => $request->email])->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
               return back()->with('fail',"The Email or Password Incorrect !!");
            }else{
                $request->session()->put('userId','$userId');
                return redirect('/');
            }
    }


    public function _update(Request $request)
    {
        // $validators = Validator::make($request->all(), [
        //     'name' => 'required|regex:/^[a-zA-Z\s]+$/',
        //     'email' => 'required|max:255',
        //     'mobile' => 'required|min:6000000000|max:9999999999|numeric',
        //     'password' => 'required|min:6',
        // ]);
        // if ($validators->passes()) {
        //     $user = User::find($request->id);
        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     $user->mobile = $request->mobile;
        //     $user->password = Hash::make($request->password);
        //     $user->save();
        //     $response = response()->json(['status' => 'true', 'message' => ' User Update Successfully', 'code' => 201]);
        // } else {
        //     $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        // }
        // return $response;
    }

    public function _delete(Request $request)
    {
        // $validators = Validator::make($request->all(), [
        //     'id' => 'required'
        // ]);
        // if ($validators->fails()) {
        //     $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        // } else {
        //     $user = User::find($request->id);
        //     if ($user) {
        //         $user = User::find($request->id)->delete();
        //         $response = response()->json(['status' => 'false', 'message' => " User Delete Successfully !!", 'status' => 201]);
        //     } else {
        //         $response = response()->json(['status' => 'false', 'message' => " User Does not exist ", 'status' => 404]);
        //     }
        // }
        // return $response;
    }

    public function _users()
    {
        // $user = User::all();
        // if (!$user) {
        //     $response = response()->json(['status' => 'true', 'message' => " The Table is Empty !!", 'status' => 201]);
        // } else {
        //     $response = response()->json(['status' => 'true', 'message' => " All User Details !!", 'status' => 201]);
        // }
        // // return $user;
        // return $response;
    }

    public function _logout()
    {
        // if (Session::has('user') && Session::get('user')['type'] == 'user') {

        //     Session::forget('user');
        //     return redirect('login');
        // } else if (Session::has('user') && Session::get('user')['type'] == 'admin') {

        //     Session::forget('user');
        //     return redirect('adminlogin');
        // } else if (Session::has('user') && Session::get('user')['type'] == 'superadmin') {

        //     Session::forget('user');
        //     return redirect('/superadminlogin');
        // } else {
        //     return redirect('/');
        // }
    }
}
