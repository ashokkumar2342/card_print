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
    	$UserRoles=UserRole::orderBy('id','ASC')->get(); 
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
    	]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $user=Auth::guard()->user(); 
    	$accounts = new User();
    	$accounts->user_name = $request->user_name;
    	$accounts->role_id = $request->role_id;
    	$accounts->mobile = $request->mobile; 
    	$accounts->email = $request->email;
    	$accounts->password = bcrypt($request['password']); 
    	$accounts->password_plain=$request->password;          
    	$accounts->created_by=$user->id;          
        $accounts->status=1;          
        $accounts->save();
        $userNewId=$accounts->id;
        DB::select(DB::raw("call up_AssignPermission_NewUser ('$userNewId')"));      
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }


    //----------start---usersPermissions-usersPermissions-----------//
    public function usersPermissions()
    {
    	$users=User::orderBy('user_name','ASC')->get(); 
      	return view('admin.UserManagement.users_permissions',compact('users'));
    }
    public function usersWiseMenuTable(Request $request)
    {
    	$user_id = $request->user_id;
        $mainMenus = MainMenu::all();
        $subMenus = SubMenu::all();
        $usersmenus = array_pluck(UsersPermission::where('user_id',$user_id)->where('status',1)->get(['sub_menu_id'])->toArray(), 'sub_menu_id'); 
      	return view('admin.UserManagement.menu_table',compact('mainMenus','subMenus','user_id','usersmenus'));
    }
    public function usersPermissionStore(Request $request)
    {
    	$rules=[
            'sub_menu' => 'required|max:1000',             
            'user' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }     
        $menuId= implode(',',$request->sub_menu); 
        DB::select(DB::raw("call up_setuserpermission ($request->user, '$menuId')")); 
        $response['msg'] = 'Access Save Successfully';
        $response['status'] = 1;
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
}
