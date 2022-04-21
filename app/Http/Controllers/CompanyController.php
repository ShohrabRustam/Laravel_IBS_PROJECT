<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function _register(Request $request)
    {
        $validators = $request->validate([
            'r_no' => 'required|unique:companies|numeric',
            'name' => 'required|min:3',
            'about' => 'required|min:6'
        ]);
        $company = new Company();
        $company->r_no = $request->r_no;
        $company->name = $request->name;
        $company->about = $request->about;
        if ($request->logo) {
            $company->logo = $request->logo;
        }
        $response = $company->save();
        if ($response) {
            return redirect('/companies');
        } else {
            return back()->with('fail', 'Ohooo .. Something Wrong !!');
        }
    }

    public function _companies()
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            $company =Company::all();
            // return $company;
            return view('Company.companies')->with('companies',$company);
        } else {
            return redirect('adminLogin');
        }
        // return "hello";

    }

    public function _addCompany()
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            return view('Company.company');
        } else {
            return redirect('adminLogin');
        }
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
        $validators = $request->validate( [
            'r_no' => 'required|unique:companies',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'about' => 'required'
        ]);
            $company = Company::find($request->id);
            $company->r_no = $request->r_no;
            $company->name = $request->name;
            $company->logo = $request->logo;
          $response=  $company->save();
          if($response){
            return "Done";
          }
    }
}
