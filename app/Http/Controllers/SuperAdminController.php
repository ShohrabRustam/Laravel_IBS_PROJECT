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

        $validators = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
        if ($validators->passes()) {
            $superAdmin = SuperAdmin::where(['email' => $request->email])->first();
            if (!$superAdmin || ($request->password!=$superAdmin->password)) {
                $response = response()->json(['status' => 'false', 'message' => ' Email or Password Incorrect !! ', 'code' => 409]);
            } else {
                $response = response()->json(['status' => 'true', 'message' => ' Login Successfully  !!', 'code' => 201]);
            }
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'code' => 201]);
        }

        return $response;

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
