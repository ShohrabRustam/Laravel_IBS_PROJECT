<?php

namespace App\Http\Controllers;

use App\Models\help;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    //
    public function help(Request $request){
        $validators= Validator::make($request->all(),[
            'name'=>'required|regex:/^[a-zA-Z\s]+$/',
            'email'=>'required|email',
            'message'=>'required'
        ]);
        if($validators->fails()){
            $response = response()->json(['status' => 'false', 'error' => $validators->errors()->all(), 'status' => 409]);
        }
        else{
            $help = new help();
            $help->name = $request->name;
            $help->email = $request->email;
            $help->message= $request->message;
            $help->save();
            return redirect('/');
            // $response = response()->json(['status' => 'true', 'message' => ' Congratulations! Message has  been sent Successfully !!', 'code' => 201]);
        }
        return $response;
    }
}
