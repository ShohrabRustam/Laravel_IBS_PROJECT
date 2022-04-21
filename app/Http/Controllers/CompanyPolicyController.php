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
        $companyid = Company::find($id);
        if ($companyid) {
            if (Session::has('user')) {
                if (Session::get('user')['type'] === 'admin' || Session::get('user')['type'] === 'superadmin') {
                    return view('Company.addPolicy')->with('companyid', $companyid);
                } else {
                    return redirect('/login');
                }
            }else{
            return redirect('/login');
            }
        } else {
            return view('error');
        }
    }

    public function _register(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'companyid' => 'required|exists:companies,id',
            'policyname' => 'required',
            'policytype' => 'required',
            'policydesc' => 'required',
            'policyprice' => 'required',
            'claimprice' => 'required',
            'timeperiod' => 'required',
        ]);
        if ($validators->passes()) {
            $policy = new CompanyPolicy();
            $policy->companyid = $request->companyid;
            $policy->policyname = $request->policyname;
            $policy->policytype = $request->policytype;
            $policy->p_desc = $request->policydesc;
            $policy->p_price = $request->policyprice;
            $policy->c_price = $request->claimprice;
            $policy->policy_period = $request->timeperiod;
            $policy->save();
            $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Policy Resgister Successfully !!', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }

    public function _update(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'companyid' => 'required|exists:companies,id',
            'policyname' => 'required',
            'policytype' => 'required',
            'policydesc' => 'required',
            'policyprice' => 'required',
            'claimprice' => 'required',
            'timeperiod' => 'required',
        ]);
        if ($validators->passes()) {
            $policy = CompanyPolicy::find($request->id);
            $policy->companyid = $request->companyid;
            $policy->policyname = $request->policyname;
            $policy->policytype = $request->policytype;
            $policy->p_desc = $request->policydesc;
            $policy->p_price = $request->policyprice;
            $policy->c_price = $request->claimprice;
            $policy->policy_period = $request->timeperiod;
            $policy->save();
            $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Policy Updated Successfully !!', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }

    public function _delete(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validators->fails()) {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        } else {
            $policy = CompanyPolicy::find($request->id);
            if ($policy) {
                $policy = CompanyPolicy::find($request->id)->delete();
                $response = response()->json(['status' => 'false', 'message' => " User Delete Successfully !!", 'status' => 201]);
            } else {
                $response = response()->json(['status' => 'false', 'message' => " User Does not exist ", 'status' => 404]);
            }
        }
        return $response;
    }
}
