<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CompanyPolicy;

class InsuranceController extends Controller
{

    public function _bike(){
        if(Session::has('user')){
            $policies = CompanyPolicy::where('policytype','Bike')->get();
        return view('Users.bikeInsurance')->with('policies',$policies);
        }else{
            return redirect('/login');
        }
    }

    public function _car(){
        if(Session::has('user')){
        $policies = CompanyPolicy::where('policytype','Car')->get();
        return view('Users.carInsurance')->with('policies',$policies);
        }
        else{
            return redirect('/login');
        }
    }

    public function _life(){
        if(Session::has('user')){
        $policies = CompanyPolicy::where('policytype','Health')->get();
        return view('Users.lifeInsurance')->with('policies',$policies);
        }
        else{
            return redirect('/login');
        }
    }

    public function _health(){
        if(Session::has('user')){
            $policies = CompanyPolicy::where('policytype','Health')->get();
            return view('Users.healthInsurance')->with('policies', $policies);
        }else{
            return redirect('/login');
        }
    }
    //
}
