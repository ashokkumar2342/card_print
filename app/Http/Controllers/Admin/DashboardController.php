<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RechargePackage;
use App\Model\District;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Validator;  

class DashboardController extends Controller
{
    public function index()
    {   
    	$user=Auth::guard('admin')->user();
    	$values=DB::select(DB::raw("call up_dashboard_query ('$user->id')")); 
    	$recharge_packages=RechargePackage::where('user_type',$user->role_id)->where('status',1)->get(); 
        return view('admin.dashboard.dashboard',compact('values','user','recharge_packages'));
    }
    public function districtUpdate()
    {   
    	$districts=District::orderBy('name_e','ASC')->get(); 
      	return view('admin.dashboard.district_update',compact('districts'));
    }
    public function districtUpdatePost(Request $request)
    {   
    	$rules=[
        'district' => 'required', 
    	]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
      	$user=Auth::guard('admin')->user(); 
    	$accounts =User::find($user->id);
    	$accounts->district_id = $request->district; 
        $accounts->save(); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }  
}
