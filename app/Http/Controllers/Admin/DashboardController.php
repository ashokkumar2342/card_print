<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RechargePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  

class DashboardController extends Controller
{
    public function index()
    {   
    	$user=Auth::guard('admin')->user();
    	$values=DB::select(DB::raw("call up_dashboard_query ('$user->id')")); 
    	$recharge_packages=RechargePackage::where('user_type',$user->role_id)->where('status',1)->get(); 
        return view('admin.dashboard.dashboard',compact('values','user','recharge_packages'));
    }  
}
