<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use App\Model\UserRole;
use App\Model\User;
use App\Model\MainMenu;
use App\Model\SubMenu;
use App\Model\UsersPermission;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\DB;  

class UserManagementController extends Controller
{
    public function index()
    {   
        $user =Auth::guard('admin')->user();
    	$UserRoles=UserRole::orderBy('id','ASC')->where('id','>',$user->role_id)->get(); 
        return view('admin.UserManagement.index',compact('UserRoles'));
    }
    public function store(Request $request)
    {   
    	$rules=[
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
    	$accounts->user_name = $request->user_name;
    	$accounts->role_id = $request->role_id;
    	$accounts->mobile = $request->mobile; 
    	$accounts->email = $request->email;
    	$accounts->password = bcrypt($request['password']); 
    	$accounts->password_plain=$request->password;          
    	$accounts->created_by=$user->id;          
        $accounts->status=0;          
        $accounts->save();
        $userNewId=$accounts->id;
        DB::select(DB::raw("call up_AssignPermission_NewUser ('$userNewId')"));      
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }


    //----------start---usersPermissions-usersPermissions-----------//
    public function userApproval()
    {
    	  
      	return view('admin.UserManagement.user_approval');
    }
    public function userApprovalList($value='')
    {
        $users=User::orderBy('user_name','ASC')->where('status',0)->get(); 
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
}
