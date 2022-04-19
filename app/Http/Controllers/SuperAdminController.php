<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class SuperAdminController extends Controller
{
    //

    public function _login(Request $request)
    {

        $validators =$request->validate( [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
            $user = SuperAdmin::where(['email' => $request->email])->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
               return back()->with('fail',"The Email or Password Incorrect !!");
            }
            return redirect('/superAdminHome');

        // $user = SuperAdmin::where(['gmail' => $req->gmail])->first();
        // if (!$user || ($req->password != $user->password)) {
        //     // return 'hello';
        //     return back()->with("fail", "Email or Password is not Match");
        // } else {
        //     $req->session()->put('user', $user);
        //     return redirect('superadminhome');
        // }
    }

    public function _logout()
    {

        // Session::forget('user');
        // return redirect('superadminlogin');
    }


}
