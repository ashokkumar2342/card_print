<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Auth;  

class DashboardController extends Controller
{
    public function index()
    {   
    	$user=Auth::guard('admin')->user();
    	$values=DB::select(DB::raw("call up_dashboard_query ('$user->id')"));
        return view('admin.dashboard.dashboard',compact('values','user'));
    }  
}
