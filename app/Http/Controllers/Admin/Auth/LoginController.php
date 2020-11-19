<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Model\User;
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
          $admins=User::where('email',$request->email)->first();
          if (!empty($admins)) { 
          $credentials = [
                     'email' => $request['email'],
                     'password' => $request['password'],
                     'status' => 1,
                 ]; 
            if(auth()->guard()->attempt($credentials)) {
                return redirect()->route('admin.dashboard');
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
    public function loginWithOTP()
    {
      return view('admin.auth.login_with_otp'); 
    }
    public function sendOtp(Request $request)
    { 
       $otp = rand(100000, 999999);
       $mobile_no=$request->mobile_no;
       $users=User::where('mobile',$request->mobile_no)->first();
       if (empty($users)) {
       $user= new User();
       $user->mobile=$request->mobile_no;
       $user->otp=$otp;
       $user->created_by=0;
       $user->status=0;
       $user->save();  
       }
       return view('admin.auth.otp_verify',compact('mobile_no')); 
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
        return  captcha_img('math');
    }
    // protected function credentials(Request $request)
    // {
    //     // return $request->only($this->username(), 'password');
    //     return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'1'];
    // }
  

    // Logout method with guard logout for admin only
 public function logout()
    {
        $this->guard()->logout();
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
