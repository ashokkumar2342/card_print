<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

        $this->middleware('admin.guest')->except('logout');
    }

    public function index(){
        return redirect()->route('admin.login');
        
    }
    
    
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
     
          $this->validate($request, [
              'email' => 'required', 
              'password' => 'required',
              'captcha' => 'required|captcha' 
          ]);
          $user=User::where('email',$request->email)->first();
          if (!empty($user)) { 
              if (password_verify($request->password,$user->password) && $user->status==1) {
                 auth()->guard('admin')->loginUsingId($user->id);
                  $lastlogin=User::find($user->id); 
                  $lastlogin->lastlogin_on=date('Y-m-d'); 
                  $lastlogin->save(); 
                  return redirect()->route('admin.dashboard');
              }else{
                 return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']);
              }
            } 

            // $student = Student::orWhere('username',$request->email)->first();
            //  if (!empty($student)) {
            //      if (Hash::check($request->password, $student->password)) {
            //          auth()->guard('student')->loginUsingId($student->id);
            //          return redirect()->route('student.dashboard');

            //      } else {
            //          return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']);
            //      }
            //  }
            
            // if (auth()->guard('student')->attempt($credentials)) {
            //   return redirect()->route('student.dashboard');
            // }
            return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']); 
        
       
    }
    public function register()
    {
      $districts=District::orderBy('Name_E','ASC')->get();
      return view('admin.auth.register',compact('districts')); 
    }
    public function registerStore(Request $request)
    {  
      $this->validate($request, [
         'district' => 'required',             
         'user_name' => 'required|string|min:3|max:50',             
         'email' => 'required|email|unique:users|max:100', 
         "mobile" => 'required|unique:users|numeric|digits:10',
         "password" => 'required|min:6|max:15', 
         "confirm_password" => 'required|min:6|max:15',
      ]); 
       
        $datas=DB::select(DB::raw("select `distributer_id` from `districts` where `d_id`=$request->district"));
        $distributer_id=$datas[0]->distributer_id;
        // $user=Auth::guard()->user(); 
        $accounts = new User();
        $accounts->district_id = $request->district;
        $accounts->user_name = $request->user_name;
        $accounts->mobile = $request->mobile; 
        $accounts->email = $request->email;
        $accounts->password = bcrypt($request['password']); 
        $accounts->password_plain=$request->password;          
        $accounts->role_id =4;
        $accounts->created_by=$distributer_id;          
        $accounts->created_on=date('Y-m-d'); 
        $accounts->status=0;


        if ($accounts->save()) {
          return redirect()->route('admin.login')->with(['message'=>'Registration Successfully','class'=>'success']); 
        }else{
          return Redirect()->back()->with(['message'=>'Something Went Wrong','class'=>'error']); 
        }
        
    }
    public function otpVerify(Request $request)
    {
       $users=User::where('mobile',$request->mobile_no)->where('otp',$request->otp)->first();
       if (empty($users)) {
          return redirect()->back()->with(['message'=>'Invalid OTP','class'=>'danger']);
       }else{
          Auth::loginUsingId($users->id);
          return redirect()->route('admin.dashboard');
       }
    }
     public function refreshCaptcha()
    {  
        return  captcha_img('flat');
    }
    // protected function credentials(Request $request)
    // {
    //     // return $request->only($this->username(), 'password');
    //     return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'1'];
    // }
  

    // Logout method with guard logout for admin only
    public function logout()
    { 
        // $this->guard()->logout();
          Session::flush();
        return redirect()->route('admin.login');
    }
    
    // defining auth  guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function forgetPassword()
    {
        return view('admin.auth.forget_password');
    }
    public function forgetPasswordSendLink(Request $request)
    {
        $AppUsers=new Admin();
        $u_detail=$AppUsers->getdetailbyemail($request->email);
        $up_u=array();
        $up_u['token'] = str_random(64);        
        $AppUsers->updateuserdetail($up_u,$u_detail->user_id);      
        $up_u['name']=$u_detail->name;
        $up_u['email']=$u_detail->email;
        $user=$u_detail->email;
        // $up_u['otp']=$up_u['otp'];
        $up_u['logo']=url("img/logo.png");
        $up_u['link']=url("passwordreset/reset/".$up_u['token']);


        Mail::send('emails.forgotPassword', $up_u, function($message){
                   $message->to('ashok@gmail.com')->subject('Password Reset');
               });
                       
        // $mailHelper = new MailHelper();
        // $mailHelper->forgetmail($request->email); 
        $response=array();
        $response['status']=1;
        $response['msg']='Reset Link Sent successfully';
        return $response;

    }
    
}
