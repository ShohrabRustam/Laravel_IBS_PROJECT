<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function _index()
    {
        return view('Users.home');
    }

    public function _contact()
    {
        return view('Users.contact');
    }

    public function _about()
    {
        return view('Users.about');
    }

    public function _help()
    {
        return view('Users.help');
    }

    public function _signupPage()
    {
        return view('Users.signup');
    }

    public function _signup(Request $request)
    {
        $validators = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255|unique:users',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $response = $user->save();
        if ($response) {
            return back()->with('success', 'You have Registered Successfully !!!');
        } else {
            return back()->with('fail', 'Ohooo .. Something Wrong !!');
        }
    }

    public function _loginPage()
    {
        return view('Users.login');
    }


    public function  _login(Request $request)
    {

        $validators = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
        $user = User::where(['email' => $request->email])->first();
        // return $user;
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('fail', "The Email or Password Incorrect !!");
        } else {
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }


    public function _updatePage($id)
    {
        $user = User::find($id);
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            return view('Users.updatePage')->with('user', $user);
        } else {
            return redirect('/superadminLogin');
        }
    }


    public function _update(Request $request)
    {
        $validators = $request->validate([
            'id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $user = User::findOrFail($request->id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $response = $user->save();
            if ($response) {
                return redirect('/usersList');
            } else {
                return back()->with('fail', 'Ohooo .. Something Wrong !!');
            }
        } else {
            return redirect('/superadminLogin');
        }
    }


    public function _users()
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $users = User::all();
            return view('Users.users')->with('users', $users);
        } else {
            return redirect('/superadminLogin');
        }
    }


    public function _showForgotPasswordForm()
    {
        return view('Users.forget');
    }


    public function _sendResetLink(Request $request)
    {
        $validators = $request->validate([
            'email' => 'required|exists:users,email',
        ]);

        $token = Str::random(64);

        $reset = new PasswordReset();
        $reset->email = $request->email;
        $reset->token = $token;
        $reset->created_at = Carbon::now();
        $response = $reset->save();
        // return "done";

        $action_link = route('resetpassword', ['token' => $token, 'email' => $request->email]);
        $body = "we are received a request to reset password for <b> www.ibs.com </b> associated with $request->email
        . You can reset your password by clicking the link below ";
        // return $body;

        Mail::send('email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('mohdrustam002@gmail.com', 'Insurance Broking System');
            $message->to($request->email, "Insurance Broking System")->subject('Reset Password');
        });
        // return "done";
        if ($response) {
            return back()->with('success', ' We have send e-mailed Successfully your reset password link  ');
        } else {
            return back()->with('fail', ' Some thing wrong  ');
        }
    }


    public function _showResetForm(Request $request, $token = null)
    {
        // return "hello";
        return view('Users.reset')->with(['token' => $request->token, 'email' => $request->email]);
        // return view('Users.reset');
    }


    public function _resetForm(Request $request)
    {

        // return $request->all();
        $validators = $request->validate([
            'email' => 'required|max:255|exists:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        // return $request->_token;
        // return "True";
        $check_token = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
        // return $check_token;

        if ($check_token) {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);
            PasswordReset::where([
                'email' => $request->email
            ])->delete();

            return redirect('/login')->with('suceess', 'Your Password has been changed!!');
        } else {
            return back()->with('fail', ' Invalid Token !! Reset Password Again !! Link is not valid ');
        }
    }


    public function _delete($id)
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $user = User::find($id)->delete();
            if ($user) {
                return redirect('/usersList');
            } else {
                return back()->with('fail', 'Some thing wrong');
            }
        } else {
            return redirect('superadminLogin');
        }
    }


    public function _logout()
    {

        // if (Session::has('user') && Session::get('user')['type'] == 'user') {
        if (Session::has('user')) {
            if (Session::get('user')['type'] === 'user') {
                Session::forget('user');
                Session::forget('risks');
                return redirect('login');
            }
            if (Session::get('user')['type'] === 'admin') {
                Session::forget('user');
                Session::forget('risks');
                return redirect('adminLogin');
            }
            if (Session::get('user')['type'] === 'superadmin') {
                Session::forget('user');
                Session::forget('risks');
                return redirect('superadminLogin');
            } else {
                return redirect('login');
            }
        }
    }

    public function _riskanalysis(){
        if (Session::has('user')) {
        return view('Users.riskAnalysis');
        }else{
            return redirect('login');
        }
    }

    public function _risk(Request $request){

        $timestamp = strtotime($request->dob);
        $year=date('Y',$timestamp);
        $currentYear = date("Y");
        $age = $currentYear - $year;
        $risk = $request->smoke  + $request->drink + $request->health + $request->cancer + $request->blood ;
        if($age<=0 || $age>=70){
            return back()->with('fail', 'You are not eligible due to your age !!');
        }
        else if ($risk>100){
            return back()->with('fail','You are not eligable for the policy ');
        }
        else if($age>0 && $age <=22){
            $risk = $risk;
        }
        else{
            $risk = $risk + ($age - 22);
        }
        $request->session()->put('risks', $risk);
        return redirect('/');
    }
}
