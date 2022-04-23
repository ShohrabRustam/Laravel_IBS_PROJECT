<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CompanyPolicyController extends Controller
{    //

    public function _addPolicy($id)
    {
        $company = Company::find($id);
        if ($company) {
            if (Session::has('user')) {
                if (Session::get('user')['type'] === 'admin' || Session::get('user')['type'] === 'superadmin') {
                    return view('Company.addPolicy')->with('company', $company);
                } else {
                    return redirect('/adminLogin');
                }
            } else {
                return redirect('/adminLogin');
            }
        } else {
            return view('error');
        }
    }


    public function _register(Request $request)
    {
        $validators = $request->validate(
            [
                'policyname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'policytype' => 'required',
                'p_desc' => 'required',
                'p_price' => 'required|numeric|min:500',
                'c_price' => 'required|numeric|min:5000',
                'policy_period' => 'required|min:1'
            ]
        );
        // return "Hello";
        if (Session::get('user')['type'] === 'admin' || Session::get('user')['type'] === 'superadmin') {
            $policy = new CompanyPolicy();
            $policy->companyid = $request->companyid;
            $policy->policyname = $request->policyname;
            $policy->policytype = $request->policytype;
            $policy->p_desc = $request->p_desc;
            $policy->p_price = $request->p_price;
            $policy->c_price = $request->c_price;
            $policy->policy_period = $request->policy_period;
            if ($request->p_price >= $request->c_price) {
                return back()->with('fail', 'The Claim price can not be less than Policy Price');
            }
            $response = $policy->save();
            if ($response) {
                return redirect('/showPolicies' . '/' . $request->companyid)->with('success', 'Policy Added Suceessfully!!');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        } else {
            return redirect('/adminLogin');
        }
    }

    public function _policies($id)
    {
        $policy = Company::where('id', $id)->first();
        $policies = CompanyPolicy::where('companyid', $id)->get();
        if ($policy) {
            if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
                return view('Company.policies')->with('policies', $policies);
            } else {
                return redirect('adminLogin');
            }
        } else {
            return view('error');
        }
        // return "hello";

    }

    public function _updatePolicyPage($id)
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            $policy = CompanyPolicy::find($id);
            if ($policy) {
                return view('Company.updatePolicy')->with('policy', $policy);
            } else {
                return back()->with('fail', 'Url is not correct ');
            }
        } else {
            return redirect('/adminLogin');
        }
    }

    public function _update(Request $request){
        $validators = $request->validate(
            [
                'policyname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'policytype' => 'required',
                'p_desc' => 'required',
                'p_price' => 'required|numeric|min:500',
                'c_price' => 'required|numeric|min:5000',
                'policy_period' => 'required|min:1'
            ]
        );
        // return "Hello";
        if (Session::get('user')['type'] === 'admin' || Session::get('user')['type'] === 'superadmin') {
            $policy = CompanyPolicy::find($request->id);
            $policy->companyid = $request->companyid;
            $policy->policyname = $request->policyname;
            $policy->policytype = $request->policytype;
            $policy->p_desc = $request->p_desc;
            $policy->p_price = $request->p_price;
            $policy->c_price = $request->c_price;
            $policy->policy_period = $request->policy_period;
            if ($request->p_price >= $request->c_price) {
                return back()->with('fail', 'The Claim price can not be less than Policy Price');
            }
            $response = $policy->save();
            if ($response) {
                return redirect('/showPolicies' . '/' . $request->companyid)->with('success', 'Policy Update Suceessfully!!');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        } else {
            return redirect('/adminLogin');
        }
    }


    public function _delete(Request $request)
    {
    }
}
