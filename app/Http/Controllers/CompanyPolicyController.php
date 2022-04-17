<?php

namespace App\Http\Controllers;

use App\Models\CompanyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyPolicyController extends Controller
{    //
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
}
