<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function _login(Request $request)
    {
            $validators =$request->validate( [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
            $user = SuperAdmin::where(['email' => $request->email])->first();
            // return $user;
            if (!$user || ($request->password!==$user->password)) {
               return back()->with('fail',"The Email or Password Incorrect !!");
            }else{
                $request->session()->put('user',$user);
                return redirect('/superAdminHome');
            }
    }

    public function _logout()
    {
        Session::forget('user');
        return redirect('/superAdminLogin');
    }

}
