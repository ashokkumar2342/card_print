<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  

class ProcessCommissionController extends Controller
{
    public function index()
    {   
        return view('admin.processcommission.index');
    }
    public function store(Request $request)
    { 
      $rules=[  
        "date" => 'required', 
         
      ]; 
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } 
      $message=DB::select(DB::raw("call up_process_commission ('$request->date')"));
       $response=['status'=>1,'msg'=>$message[0]->result];
            return response()->json($response); 
    }  
}
