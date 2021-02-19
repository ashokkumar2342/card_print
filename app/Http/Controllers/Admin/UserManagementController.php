<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\MainMenu;
use App\Model\RechargePackage;
use App\Model\RechargeRequest;
use App\Model\SubMenu;
use App\Model\User;
use App\Model\UserRole;
use App\Model\UsersPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  

class UserManagementController extends Controller
{
    public function index()
    {   
      $user =Auth::guard('admin')->user();
      $districts = District::orderBy('Name_E', 'ASC')->get();
      // if($user->id<=2){
      //   $districts = District::orderBy('Name_E', 'ASC')->get();
      // }else{
      //   $districts = District::where('d_id',$user->district_id)->orderBy('Name_E', 'ASC')->get();
      // }
    	$UserRoles=UserRole::orderBy('id','ASC')->where('id','>',$user->role_id)->where('id','!=',3)->get(); 
        return view('admin.UserManagement.index',compact('UserRoles', 'districts'));
    }
    public function store(Request $request)
    {   
    	$rules=[
        'district' => 'required',             
        'user_name' => 'required|string|min:3|max:50',             
        "role_id" => 'required',
        "mobile" => 'required|unique:users|numeric|digits:10',
        'email' => 'required|email|unique:users|max:100',
        "password" => 'required|min:6|max:15', 
        "confirm_password" => 'required|min:6|max:15',
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
      	$accounts = new User();
      	$accounts->district_id = $request->district;
        $accounts->user_name = $request->user_name;
      	$accounts->role_id = $request->role_id;
      	$accounts->mobile = $request->mobile; 
      	$accounts->email = $request->email;
      	$accounts->password = bcrypt($request['password']); 
      	$accounts->password_plain=$request->password;          
      	$accounts->created_by=$user->id;          
        $accounts->status=0;          
        $accounts->created_on=date('Y-m-d');          
        $accounts->save();
        $userNewId=$accounts->id;
        DB::select(DB::raw("call up_AssignPermission_NewUser ('$userNewId')"));      
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }

    public function userList($value='')
    {
      $user=Auth::guard('admin')->user();
      $users =User::where('created_by',$user->id)->where('status','!=',0)->get(); 
      return view('admin.UserManagement.status_list',compact('users'));
    }
    public function userListStatus($id)
    {
      $id=Crypt::decrypt($id);
      $user=User::find($id);
      if ($user->status==1) {
       $user->status=2;   
      }
      elseif ($user->status==2) {
       $user->status=1;   
      }
      $user->save();
      return redirect()->back()->with(['message'=>'Status Change Successfully','class'=>'success']);   
    }
    //----------start---usersPermissions-usersPermissions-----------//
    public function userApproval()
    {
    	  
      	return view('admin.UserManagement.user_approval');
    }
    public function userApprovalList($value='')
    {
        $user=Auth::guard('admin')->user();
        $condition = '';
        if ($user->id <= 2){
          $condition = " and `u`.`created_by` <= 2";
        }else{
          $condition = " and `u`.`created_by` = ".$user->id;
        }
        $users =  DB::select(DB::raw("select `u`.`id`, `d`.`Name_E`, `u`.`user_name`, `u`.`email`, `u`.`mobile`, `u`.`status`, `ur`.`r_name` from `users` `u` inner join `user_roles` `ur` on `u`.`role_id` = `ur`.`id` Inner Join `districts` `d` on `d`.`d_id` = `u`.`district_id` where `u`.`status` = 0 $condition;")); 
        return view('admin.UserManagement.user_list',compact('users'));
    }
    public function userApprovalForm($op_id)
    {
    	$op_id = $op_id; 
      	return view('admin.UserManagement.user_approval_form',compact('op_id'));
    }
    public function userApprovalStore(Request $request)
    {
    	$rules=[
            'op_id' => 'required',  
            'charge_card' => 'required',  
            'free_card' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

        $role_id=User::where('id', $request->op_id)->first();  
        
        if ($request->charge_card<20 && $role_id->role_id == 4){
          $response=array();
          $response["status"]=0;
          $response["msg"]='Charge per card cannot be less than 20';
          return response()->json($response);// response as json
             
        }elseif($request->charge_card<16 && $role_id->role_id == 3){
          $response=array();
          $response["status"]=0;
          $response["msg"]='Charge per card cannot be less than 16';
          return response()->json($response);// response as json
        }
        $user=Auth::guard('admin')->user();  
        $message=DB::select(DB::raw("call up_approve_user ($user->id, '$request->op_id','$request->charge_card','$request->free_card')"));
        if ($message[0]->result=='success') {
        $response['msg'] =$message[0]->result;
        $response['status'] = 1; 
        }
        else{
        $response['msg'] =$message[0]->result;
        $response['status'] = 0;   
        } 
        return response()->json($response);
    }
    //----------End---usersPermissions-usersPermissions-----------// 
    public function DataTransfer($value='')
    {
     	return view('admin.DataTransfer.form');
    }
    public function DataTransferStore(Request $request)
    {
     	 
       
      \Artisan::queue('data:transfer',['part_no'=>$request->part_no]);  
       $response=['status'=>1,'msg'=>'Submit Successfully'];
          return response()->json($response);
    } 
    public function changePassword(Request $request)
    { 
      return view('admin.myaccount.change_password');
    }
    public function changePasswordStore(Request $request)
    { 
      $rules=[
      'oldpassword'=> 'required',
      'password'=> 'required|min:6',
      'passwordconfirmation'=> 'required|min:6|same:password',
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
        
      if(password_verify($request->oldpassword,$user->password)){
          if ($request->oldpassword == $request->password) {
               $response=['status'=>0,'msg'=>'Old Password And New Password Cannot Be Same'];
               return response()->json($response);
          }else{
                $accounts =  User::find($user->id); 
                $accounts->password = bcrypt($request['password']); 
                $accounts->password_plain=$request->password;  
                $accounts->save();  
                $response=['status'=>1,'msg'=>'Password Change Successfully'];
                return response()->json($response);// response as json 
          }
          
      }else{               
          $response=['status'=>0,'msg'=>'Old Password Is Not Correct'];
          return response()->json($response);// response as json
      }        
    }
    public function resetPassword()
    { 
      $user=Auth::guard('admin')->user();
      if ($user->id<=2){
        $users =  User::where('created_by','<=',2)->get(); 
      }else{
        $users =  User::where('created_by',$user->id)->get();   
      }
      
      return view('admin.myaccount.reset_password',compact('users'));
    }
    public function resetPasswordStore(Request $request)
    { 
      $rules=[
       
      'password'=> 'required|min:6|max:15',
      'passwordconfirmation'=> 'required|min:6|max:15|same:password',
       ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }  
      $accounts =  User::find($request->user_id); 
      $accounts->password = bcrypt($request['password']); 
      $accounts->password_plain=$request->password;  
      $accounts->save();  
      $response=['status'=>1,'msg'=>'Reset Password Successfully'];
      return response()->json($response);// response as json 
    }

    public function userReport()
    { 
      $user=Auth::guard('admin')->user();
      $users =  User::where('created_by',$user->id)->get(); 
      $userRoles =  DB::select(DB::raw("select * from `user_roles` where `id` > (Select `role_id` from `users` where `id` = $user->id) order by `id`;")); 
      return view('admin.UserManagement.user_report',compact('userRoles'));
    }
    
    public function userReportGenerate(Request $request)
    {
      $user=Auth::guard('admin')->user();
      $path=Storage_path('fonts/');
      $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
      $fontDirs = $defaultConfig['fontDir']; 
      $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
      $fontData = $defaultFontConfig['fontdata']; 
      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
             'fontDir' => array_merge($fontDirs, [
                 __DIR__ . $path,
             ]),
             'fontdata' => $fontData + [
                 'frutiger' => [
                     'R' => 'FreeSans.ttf',
                     'I' => 'FreeSansOblique.ttf',
                 ]
             ],
             'default_font' => 'freesans',
             'pagenumPrefix' => '',
            'pagenumSuffix' => '',
            'nbpgPrefix' => ' कुल ',
            'nbpgSuffix' => ' पृष्ठों का पृष्ठ'
         ]);

      $role_type=$request->role_id;
      if ($role_type == 0){
        $role_type=4;  
      }
      
      $user_status = $request->status;
      $status_cond = '';
      if($user_status == 1){
        $status_cond = " and `us`.`status` = 1";
      }elseif($user_status == 2){
        $status_cond = " and `us`.`status` = 2";
      }
      
      $balance_cond = $request->cond_bal_amount;
      $balance_amt = $request->amount;
      if(empty($request->amount)){
        $balance_amt = 0;
      }

      $cond_balance = '';
      if($balance_cond == 1){
        $cond_balance = " and `ba`.`amt` >= $balance_amt";
      }
      if($balance_cond == 2){
        $cond_balance = " and `ba`.`amt` <= $balance_amt";
      }


      $card_cond = $request->cond_card_print;
      $card_count = $request->card;
      if(empty($request->card)){
        $card_count = 0;
      }

      $cond_card = '';
      if($card_cond == 1){
        $cond_card = " and (select count(*) from `cashbook` where `user_id` = `us`.`id` and `transaction_type` = 0) >= $card_count";
      }
      if($card_cond == 2){
        $cond_card = " and (select count(*) from `cashbook` where `user_id` = `us`.`id` and `transaction_type` = 0) <= $card_count";
      }

      $html = view('admin.UserManagement.user_report_pdf_start');
      $user_role_type = $user->role_id;
      $user_id = $user->id;
      $margin = 2;
      if ($user_role_type==1){
        $html = $html.$this->userReportDistributer($user_id, $role_type, $status_cond, $cond_card, $cond_balance, $margin);
        if($role_type>=3){
          $html = $html.$this->userReportAgent($user_id, $role_type, $status_cond, $cond_card,$cond_balance, $margin);  
        }
        if($role_type>=4){
          $html = $html.$this->userReportOperator($user_id, $role_type, $status_cond, $cond_card, $cond_balance, $margin);  
        }
      }elseif($user_role_type==2){
        $html = $html.$this->userReportAgent($user_id, $role_type, $status_cond, $cond_card, $cond_balance, $margin);
        if($role_type>=4){
          $html = $html.$this->userReportOperator($user_id, $role_type, $status_cond, $cond_card, $cond_balance, $margin);  
        }
      }elseif($user_role_type==3){
        $html = $html.$this->userReportOperator($user_id, $role_type, $status_cond, $cond_card, $cond_balance, $margin);
      }
      
      $mpdf->WriteHTML($html); 

      $html = "</tbody></table></body></html>";
      $mpdf->WriteHTML($html);      
      $mpdf->Output(); 
       
    }

    public function userReportDistributer($user_id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin)
    {
      $condition = '';
      if ($user_id <= 2){
        $condition = " and `us`.`created_by` <= 2";
      }else{
        $condition = " and `us`.`created_by` = ".$user_id;
      }
      $myquery = "select `us`.`id`, `us`.`user_name`, `us`.`email`, `us`.`mobile`, `us`.`role_id`, `us`.`status`, `ba`.`amt`,
        (select count(*) from `cashbook` where `user_id` = `us`.`id` and `transaction_type` = 0) as `tcardprint` 
        from `users` `us`
        inner join `balanceamt` `ba` on `ba`.`userid` = `us`.`id`
        where `us`.`role_id` = 2
        $condition $status_cond order by `us`.`user_name`;";

      $distributers =  DB::select(DB::raw($myquery));
      $html = '';
      foreach ($distributers as $users) {
        $bgcolor = 'lightgreen';
        $html = $html.view('admin.UserManagement.user_report_pdf',compact('users','margin', 'bgcolor'));
        if ($role_type > 2){
          $html = $html.$this->userReportAgent($users->id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin+20);
        }
        if ($role_type > 3){  
          $html = $html.$this->userReportOperator($users->id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin+20);
        }
      }
      return $html;
    }

    public function userReportAgent($user_id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin)
    {
      $condition = '';
      if ($user_id <= 2){
        $condition = " and `us`.`created_by` <= 2";
      }else{
        $condition = " and `us`.`created_by` = ".$user_id;
      }
      $myquery = "select `us`.`id`, `us`.`user_name`, `us`.`email`, `us`.`mobile`, `us`.`role_id`, `us`.`status`, `ba`.`amt`,
        (select count(*) from `cashbook` where `user_id` = `us`.`id` and `transaction_type` = 0) as `tcardprint` 
        from `users` `us`
        inner join `balanceamt` `ba` on `ba`.`userid` = `us`.`id`
        where `us`.`role_id` = 3
        $condition $status_cond order by `us`.`user_name`;";

      $agents =  DB::select(DB::raw($myquery));
      $html = '';
      foreach ($agents as $users) {
        $bgcolor = 'yellow';
        $html = $html.view('admin.UserManagement.user_report_pdf',compact('users','margin', 'bgcolor'));
        if ($role_type > 3){
          $html = $html.$this->userReportOperator($users->id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin+35);
        }
      }
      return $html;
    }


    public function userReportOperator($user_id, $role_type, $status_cond, $cardPrint, $BalcaneAmt, $margin)
    {
      $condition = '';
      if ($user_id <= 2){
        $condition = " and `us`.`created_by` <= 2";
      }else{
        $condition = " and `us`.`created_by` = ".$user_id;
      }
      $myquery = "select `us`.`id`, `us`.`user_name`, `us`.`email`, `us`.`mobile`, `us`.`role_id`, `us`.`status`, `ba`.`amt`,
        (select count(*) from `cashbook` where `user_id` = `us`.`id` and `transaction_type` = 0) as `tcardprint` 
        from `users` `us`
        inner join `balanceamt` `ba` on `ba`.`userid` = `us`.`id`
        where `us`.`role_id` = 4
        $condition $status_cond $cardPrint $BalcaneAmt order by `us`.`user_name`;";

      $Operators =  DB::select(DB::raw($myquery));
      $html = '';
      foreach ($Operators as $users) {
        $bgcolor = 'orange';
        $html = $html.view('admin.UserManagement.user_report_pdf',compact('users','margin','bgcolor'));  
      }
      return $html;
    }





    public function reportDatewise()
    {
      return view('admin.UserManagement.report_date_wise',compact('userRoles')); 
    }
    public function reportDatewiseShow(Request $request)
    {
      $rules=[ 
          'date_range'=> 'required', 
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
      $condition = "";
      if ($user->id<=2){
        $condition = " and `u`.`created_by` <= 2 ";
      }else {
        $condition = " and `u`.`created_by`= $user->id ";
      }
      $date_range= explode('-',$request->date_range);
      $from_date = date('Y-m-d H:i:s',strtotime($date_range[0]));
      $to_date =  date('Y-m-d H:i:s',strtotime($date_range[1]));  
      $datas=DB::select(DB::raw("select concat(`u`.`user_name`, ' - ', `u`.`mobile`) as `uname`, `cb`.`transaction_date_time`, `cb`.`camount`, `cb`.`transaction_no`, case `cb`.`transaction_type` when 1 then 'Online' When 2 then 'Cash' End as `ttype`, `cb`.`remarks`, case `cb`.`status` when 0 then '' when 1 then 'Pending' when 2 then 'Rejected' End as `tstatus` from `cashbook` `cb` Inner join `users` `u` on `u`.`id` = `cb`.`user_id` Left Join `payment_mode` `pm` on `pm`.`id` = `cb`.`payment_mode_id` Where `cb`.`transaction_type` in (1,2) $condition And `cb`.`transaction_date_time` >= '$from_date' and `cb`.`transaction_date_time` < date_add('$to_date', INTERVAL 1 DAY) Order By `cb`.`id`;"));  
      $response=array();
      $response["status"]=1;
      $response["data"]=view('admin.UserManagement.report_date_wise_show',compact('datas','from_date','to_date'))->render();
      return response()->json($response);
    }
    public function reportDatewiseData($from_date,$to_date)
    {
        ini_set('max_execution_time', '3600');
      ini_set('memory_limit','999M');
      ini_set("pcre.backtrack_limit", "5000000");
        $from_date = date('Y-m-d H:i:s',strtotime($from_date));
        $to_date =  date('Y-m-d H:i:s',strtotime($to_date));
        $RechargePackages=RechargeRequest::whereBetween('transaction_date',[$from_date,$to_date])->where('status',1)->where('owner_user_id','<=',2)->select('package_id')->get();
        $total =0;
        foreach ($RechargePackages as $RechargePackages) {
          $total += $RechargePackages->RechargePackage->package_price;
        }
        echo $total;
       // $RechargePackage=RechargePackage:: RechargePackage
       
       
    }
    public function reportDatewiseDownload($from_date,$to_date)
    {
      $user=Auth::guard('admin')->user();
      $condition = "";
      if ($user->id<=2){
        $condition = " and `u`.`created_by` <= 2 ";
      }else {
        $condition = " and `u`.`created_by`= $user->id ";
      } 
      $datas=DB::select(DB::raw("select concat(`u`.`user_name`, ' - ', `u`.`mobile`) as `uname`, `cb`.`transaction_date_time`, `cb`.`camount`, `cb`.`transaction_no`, case `cb`.`transaction_type` when 1 then 'Online' When 2 then 'Cash' End as `ttype`, `cb`.`remarks`, case `cb`.`status` when 0 then '' when 1 then 'Pending' when 2 then 'Rejected' End as `tstatus` from `cashbook` `cb` Inner join `users` `u` on `u`.`id` = `cb`.`user_id` Left Join `payment_mode` `pm` on `pm`.`id` = `cb`.`payment_mode_id` Where `cb`.`transaction_type` in (1,2) $condition And `cb`.`transaction_date_time` >= '$from_date' and `cb`.`transaction_date_time` < date_add('$to_date', INTERVAL 1 DAY) Order By `cb`.`id`;"));
      $path=Storage_path('fonts/');
      $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
      $fontDirs = $defaultConfig['fontDir']; 
      $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
      $fontData = $defaultFontConfig['fontdata']; 
      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
           'fontDir' => array_merge($fontDirs, [
               __DIR__ . $path,
           ]),
           'fontdata' => $fontData + [
               'frutiger' => [
                   'R' => 'FreeSans.ttf',
                   'I' => 'FreeSansOblique.ttf',
               ]
           ],
           'default_font' => 'freesans',
           'pagenumPrefix' => '',
          'pagenumSuffix' => '',
          'nbpgPrefix' => ' कुल ',
          'nbpgSuffix' => ' पृष्ठों का पृष्ठ'
       ]);
      $html = view('admin.UserManagement.report_date_wise_pdf',compact('datas'));
      $mpdf->WriteHTML($html); 
      $mpdf->Output(); 
    }
    public function modifyPerCard()
    { 
      $user=Auth::guard('admin')->user();
      $users=User::where('created_by',$user->id)->orWhere('created_by','<=',2)->where('status',1)->get();
      return view('admin.UserManagement.modify_per_card',compact('users'));
    }
    public function modifyPerCardStore(Request $request)
    {
      $rules=[
        'user_id' => 'required',             
        "charge_card" => 'required', 
      ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        return  $request;
    }

    public function mappingDistrictUser()
    {
      $user=Auth::guard('admin')->user(); 
      $districts=District::orderBy('Name_E','ASC')->get();
      $users=User::where('role_id',2)->orderBy('user_name','ASC')->orderBy('status',1)->get();
      return view('admin.UserManagement.mapping',compact('users','districts')); 
    }
    public function mappingDistrictWiseList(Request $request)
    { 
      $districts=District::where('d_id',$request->id)->get();
      return view('admin.UserManagement.mapping_list',compact('districts')); 
    }
    public function mappingDistrictUserStore(Request $request)
    {
      $rules=[
        'district' => 'required',             
        "distributer" => 'required', 
      ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $datas=DB::select(DB::raw("update `districts` set `distributer_id`=$request->distributer where `d_id`=$request->district"));
        
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    } 
}
