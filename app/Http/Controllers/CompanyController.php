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
            $company = Company::all();
            // return $company;
            return view('Company.companies')->with('companies', $company);
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

    public function _delete($id)
    {

        $company = Company::find($id);
        if ($company) {
            $company = Company::find($id)->delete();
            return redirect('/companies');
        } else {
            return back()->with('fail', 'Some thing wrong !!');
        }
    }


    public function _updateCompanyPage($id)
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            $company = Company::find($id);
            if ($company) {
                return view('Company.updateCompany')->with('company', $company);
            } else {
                return back()->with('fail', 'Url is not correct ');
            }
        } else {
            return redirect('/adminLogin');
        }
    }

    public function _updateCompany(Request $request)
    {
        // return $request;
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            $validators = $request->validate([
                'r_no' => 'required|numeric|unique:companies,r_no',
                'name' => 'required|min:3',
                'about' => 'required|min:6'
            ]);

            $company = Company::find($request->id);
            $company->r_no = $request->r_no;
            $company->name = $request->name;
            if ($request->logo) {
                $company->logo = $request->logo;
            } else {
            }
            $response =  $company->update();
            if ($response) {
                return redirect('companies');
            }
        } else {
            return redirect('/adminLogin');
        }
    }
}
