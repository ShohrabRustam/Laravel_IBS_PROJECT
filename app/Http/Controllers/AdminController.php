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
        'email' => 'required|max:255|unique:admins,email',
        'mobile' => 'required|min:6000000000|max:9999999999|numeric|unique:admins',
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
    }

    public function  _login(Request $request)
    {
        $validators = $request->validate([
            'email' => 'required|max:255|exists:admins',
            'password' => 'required|min:6'
        ]);
        $admin = Admin::where(['email' => $request->email])->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('fail', "The Email or Password Incorrect !!");
        }
        $request->session()->put('user', $admin);
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
            if (Session::get('user')['type'] === 'admin') {
                Session::forget('user');
                return redirect('adminLogin');
            }
            if (Session::get('user')['type'] === 'superadmin') {
                Session::forget('user');
                return redirect('superadminLogin');
            }
        } else {
            return redirect('/adminLogin');
        }
    }
}
