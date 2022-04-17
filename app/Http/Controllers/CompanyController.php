<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function _register(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'r_no' => 'required|unique:companies',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'about' => 'required'
        ]);
        if ($validators->passes()) {
            $company = new Company();
            $company->r_no = $request->r_no;
            $company->name = $request->name;
            $company->logo = $request->logo;
            $company->save();
            $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Company Resgister Successfully !!', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }
}
