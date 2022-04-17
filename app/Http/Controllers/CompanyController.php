<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function _register(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'r_no' => 'required|unique:companies|numeric',
            'name' => 'required|min:6',
            'about' => 'required|min:10'
        ]);
        if ($validators->passes()) {
            $company = new Company();
            $company->r_no = $request->r_no;
            $company->name = $request->name;
            $company->about = $request->about;
            if($request->logo){
            $company->logo = $request->logo;
            }
            $company->save();
            // return "Done";
            $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Company Resgister Successfully !!', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }

    public function _companies()
    {
        $company = Company::all();
        if (!$company) {
            $response = response()->json(['status' => 'true', 'message' => " The Table is Empty !!", 'status' => 201]);
        } else {
            $response = response()->json(['status' => 'true', 'message' => " All Company Details !!", 'status' => 201]);
        }
        // return $companies;
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
            $company = Company::find($request->id);
            if ($company) {
                $company = Company::find($request->id)->delete();
                $response = response()->json(['status' => 'false', 'message' => " User Delete Successfully !!", 'status' => 201]);
            } else {
                $response = response()->json(['status' => 'false', 'message' => " User Does not exist ", 'status' => 404]);
            }
        }
        return $response;
    }

    public function _update(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'r_no' => 'required|unique:companies',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'about' => 'required'
        ]);
        if ($validators->passes()) {
            $company = Company::find($request->id);
            $company->r_no = $request->r_no;
            $company->name = $request->name;
            $company->logo = $request->logo;
            $company->save();
            $response = response()->json(['status' => 'true', 'message' => ' Company details updated Successfully', 'code' => 201]);
        } else {
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        return $response;
    }


}
