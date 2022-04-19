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
        'email' => 'required|max:255|unique:users',
        'mobile' => 'required|min:6000000000|max:9999999999|numeric|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $response = $user->save();
        if ($response) {
            return back()->with('success', 'Admin Registered Successfully !!!');
        } else {
            return back()->with('fail', 'Ohooo .. Something Wrong !!');
        }
        // if (Session::has('user') && Session::get('user')['type'] == 'superadmin') {

        //     return redirect('adminlogin');
        // } else {
        //     return redirect('superadminlogin');
        // }
    }

    public function  _login(Request $request)
    {
        $validators = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
        $user = Admin::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('fail', "The Email or Password Incorrect !!");
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

        return $admin;
    }

    public function _update(Request $request)
    {
        $validators = $request->validate( [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
        ]);
            $admin = Admin::find($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->mobile = $request->mobile;
            $admin->password = Hash::make($request->password);
            $admin->save();
          }


    public function _logout()
    {

        if (Session::has('user')) {
            if (Session::get('user')['type'] === 'user') {
                Session::forget('user');
                return redirect('login');
            }
            if (Session::get('user')['type'] === 'admin') {
                Session::forget('user');
                return redirect('adminLogin');
            }
            if (Session::get('user')['type'] === 'superadmin') {
                Session::forget('user');
                return redirect('superadminLogin');
            }
        } else {
            return redirect('login');
        }
    }
}
