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

        $t_date = date('Y-m-d');
        $work_details = DB::select(DB::raw("select `Name_E`, (select count(*) from `users` where `district_id` = `d_id` and `status` = 1) as `total_user`,
(select count(*) from `users` where `district_id` = `d_id` and `created_on` = '$t_date') as `new_user`,
(select count(*) from `users` where `district_id` = `d_id` and `lastlogin_on` = '$t_date') as `active_user`,
(select count(*) from `cashbook` `cb` inner Join `users` `u` on `u`.`id` = `cb`.`user_id` where `cb`.`transaction_date_time` >= '$t_date' and `cb`. `transaction_type` = 0 and `u`.`district_id` = `d_id`) as `print_card`,
(select ifnull(sum(`rp`.`package_price`),0) from `recharge_request` `rr` inner join `recharge_package` `rp` on `rp`.`id` = `rr`.`package_id` inner join `users` `u` on `rr`.`user_id` = `u`.`id` where `rr`.`status` = 1 and `rr`.`owner_user_id` <=2 and `rr`.`transaction_date` = '$t_date' and `u`.`district_id` = `d_id`) as `recharge`,
(select ifnull(count(`rp`.`package_price`),0) from `recharge_request` `rr` inner join `recharge_package` `rp` on `rp`.`id` = `rr`.`package_id` inner join `users` `u` on `rr`.`user_id` = `u`.`id` where `rr`.`status` = 1 and `rr`.`owner_user_id` <=2 and `rr`.`transaction_date` = '$t_date' and `u`.`district_id` = `d_id`) as `t_req_recharge`,
(select ifnull(sum(`rp`.`package_price`),0) from `recharge_request` `rr` inner join `recharge_package` `rp` on `rp`.`id` = `rr`.`package_id` inner join `users` `u` on `rr`.`user_id` = `u`.`id` where `rr`.`status` = 1 and `rr`.`owner_user_id` <=2 and `rr`.`transaction_date` = '$t_date' and `u`.`created_on` = '$t_date' and `u`.`district_id` = `d_id`) as `t_act_recharge`,
(select ifnull(count(`rp`.`package_price`),0) from `recharge_request` `rr` inner join `recharge_package` `rp` on `rp`.`id` = `rr`.`package_id` inner join `users` `u` on `rr`.`user_id` = `u`.`id` where `rr`.`status` = 1 and `rr`.`owner_user_id` <=2 and `rr`.`transaction_date` = '$t_date' and `u`.`created_on` = '$t_date' and `u`.`district_id` = `d_id`) as `t_act__req_recharge`,
(select count(`cpr`.`id`) 
from `card_print_record` `cpr` 
inner join `users` `us` on `us`.`id` = `cpr`.`user_id`
where `cpr`.`ondate` = '$t_date' and `cpr`.`card_type` = 2 and `us`.`district_id` = `d_id`) as `t_aadhar_card`,
(select count(`cpr`.`id`) 
from `card_print_record` `cpr` 
inner join `users` `us` on `us`.`id` = `cpr`.`user_id`
where `cpr`.`ondate` = '$t_date' and `cpr`.`card_type` = 3 and `us`.`district_id` = `d_id`) as `t_pan_card`
from `districts`
Order By trim(`Name_E`);"));
        
        
        $totals = array('Total',0,0,0,0,0,0,0,0);
        foreach ($work_details as $key => $work_detail) {
            $totals[1] = $totals[1] + $work_detail->total_user;
            $totals[2] = $totals[2] + $work_detail->new_user;
            $totals[3] = $totals[3] + $work_detail->active_user;
            $totals[4] = $totals[4] + $work_detail->print_card;
            $totals[5] = $totals[5] + $work_detail->recharge;
            $totals[6] = $totals[6] + $work_detail->t_req_recharge;
            // $totals[7] = $totals[7] + $work_detail->t_act_recharge;
            // $totals[8] = $totals[8] + $work_detail->t_act__req_recharge;
            $totals[7] = $totals[7] + $work_detail->t_aadhar_card;
            $totals[8] = $totals[8] + $work_detail->t_pan_card;
        }
        // dd($totals[0].' / '.$totals[1]);
        return view('admin.dashboard.dashboard',compact('values','user','recharge_packages', 'work_details', 'totals'));
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
