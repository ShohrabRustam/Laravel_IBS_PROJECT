<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function _signup(Request $request)
    {
        $validators = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255|unique:admins',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric|unique:admins',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $response=$user->save();
            if($response){
                return back()->with('success','You have Registered Successfully !!!');
            }
            else{
                return back()->with('fail','Ohooo .. Something Wrong !!');
            }
        // if (Session::has('user') && Session::get('user')['type'] == 'superadmin') {

        //     return redirect('adminlogin');
        // } else {
        //     return redirect('superadminlogin');
        // }
    }

    public function  _login(Request $request)
    {
        $validators =$request->validate( [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
            $user = Admin::where(['email' => $request->email])->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
               return back()->with('fail',"The Email or Password Incorrect !!");
            }
            return redirect('/adminHome');

    }

    public function _delete(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validators->fails()) {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        } else {
            $admin = Admin::find($request->id);
            if ($admin) {
                $admin = Admin::find($request->id)->delete();
                $response = response()->json(['status' => 'false', 'message' => " Admin Delete Successfully !!", 'status' => 201]);
            } else {
                $response = response()->json(['status' => 'false', 'message' => " Admin Does not exist ", 'status' => 404]);
            }
        }
        return $response;
    }


    public function _admins()
    {
        $admin = Admin::all();
        if (!$admin) {
            $response = response()->json(['status' => 'true', 'message' => " The Table is Empty !!", 'status' => 201]);
        } else {
            $response = response()->json(['status' => 'true', 'message' => " All Admins Details !!", 'status' => 201]);
        }
        // return $admin;
        return $response;
    }

    public function _update(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
        ]);
        if ($validators->passes()) {
            $admin = Admin::find($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->mobile = $request->mobile;
            $admin->password = Hash::make($request->password);
            $admin->save();
            $response = response()->json(['status' => 'true', 'message' => ' User Update Successfully', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }


    public function _logout()
    {

        Session::forget('user');
        return redirect('/adminHome');
        // if (Session::has('user') && Session::get('user')['type'] == 'superadmin') {

        //     Session::forget('user');
        //     return redirect('/superadminlogin');
        // } else {
        //     Session::forget('user');
        //     return redirect('/adminlogin');
        // }
    }
}
