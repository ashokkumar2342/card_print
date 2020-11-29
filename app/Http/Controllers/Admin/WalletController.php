<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cashbook;
use App\Model\PaymentMode;
use App\Model\PaymentOption;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  

class WalletController extends Controller
{
    public function paymentOption()
    {  
       $user=Auth::guard('admin')->user();
       $paymentModes=PaymentMode::all();	 
       $paymentOptions=PaymentOption::where('user_id',$user->id)->get();   
       return view('admin.wallet.payment_option',compact('paymentModes','paymentOptions'));  
    }
    public function paymentOptionChange(Request $request)
    {
       $paymentmodeid=$request->id;
       return view('admin.wallet.payment_option_form',compact('paymentmodeid'));
    }
    public function paymentOptionStore(Request $request)
    { 
      if ($request->payment_mode!=1) {
           $rules=[  
            "payment_mode" => 'required', 
            "account_name" => 'required', 
            "qr_code" => 'required', 
          ];  
      }else{
          $rules=[  
          "payment_mode" => 'required', 
          "account_no" => 'required', 
          "ifsc_code" => 'required', 
          "account_name" => 'required', 
          "bank_name" => 'required', 
          "branch_name" => 'required', 
        ];
      }  
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
       $user=Auth::guard('admin')->user(); 
       $PaymentOption=new PaymentOption();
       $PaymentOption->user_id=$user->id;
       $PaymentOption->payment_mode_id=$request->payment_mode; 
       $PaymentOption->account_no=$request->account_no;
       $PaymentOption->ifsc_code=$request->ifsc_code;
       $PaymentOption->account_name=$request->account_name;
       $PaymentOption->bank_name=$request->bank_name;
       $PaymentOption->branch_name=$request->branch_name;
       $PaymentOption->status=1; 
       $PaymentOption->save(); 
       //--start-image-save
       if ($request->payment_mode!=1) { 
    	    $dirpath = Storage_path() . '/app/qrcode/'.$PaymentOption->id;
    	    $vpath = '/qrcode/'.$PaymentOption->id;
    	    @mkdir($dirpath, 0755, true);
    	    $file =$request->qr_code;
    	    $imagedata = file_get_contents($file);
    	    $encode = base64_encode($imagedata);
    	    $image=base64_decode($encode);
          $name=$PaymentOption->id; 
    	    $image= \Storage::disk('local')->put($vpath.'/'.$name.'.jpg',$image);
          $PaymentOptions=PaymentOption::find($PaymentOption->id);
          $PaymentOptions->qr_code=$vpath.'/'.$PaymentOption->id.'.jpg'; 
          $PaymentOptions->save(); 
       }
	    //--end-image-save 
       $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function paymentOptionStatus($id)
    {
      $PaymentOptions=PaymentOption::find($id);
      if ($PaymentOptions->status==1) {
          $PaymentOptions->status=0; 
       }
      elseif ($PaymentOptions->status==0) {
          $PaymentOptions->status=1; 
       }
       $PaymentOptions->save();
       return redirect()->back()->with(['message'=>'Successfully','class'=>'success']); 
    }
    public function cashbook()
    {  
       $paymentModes=PaymentMode::all();	 
       return view('admin.wallet.cashbook',compact('paymentModes'));  
    }
    public function cashbookStore(Request $request)
    {   
    	$rules=[  
        "payment_mode" => 'required', 
        "transaction_date" => 'required', 
        "amount" => 'required', 
        "transaction_no" => 'required', 
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
       $Cashbook=new Cashbook();
       $Cashbook->user_id=$user->id; 
       $Cashbook->payment_mode_id=$request->payment_mode;
       $Cashbook->camount=$request->amount;
       $Cashbook->damount='';
       $Cashbook->transaction_no=$request->transaction_no;
       $Cashbook->transaction_date_time=$request->transaction_date;
       $Cashbook->transaction_type=1;
       $Cashbook->balance=0;
       $Cashbook->remarks='Recharge Wallet';
       $Cashbook->status=1;
       $Cashbook->save();
       $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function rechargeWallet()
    {  
      $paymentModes=PaymentMode::all(); 
       return view('admin.wallet.recharge_wallet',compact('paymentModes'));  
    }  
    public function paymentOptionShow(Request $request)
    {
      $payment_mode_id =$request->id;
       $user=Auth::guard('admin')->user();
        if ($user->created_by == 0) {

            $paymentOptions=PaymentOption::whereIn('user_id',[1,2])->where('payment_mode_id',$payment_mode_id)->where('status',1)->get();
        }else{
            $paymentOptions=PaymentOption::where('user_id',$user->created_by)->where('payment_mode_id',$payment_mode_id)->where('status',1)->get();
        } 
       return view('admin.wallet.payment_option_show',compact('paymentOptions','payment_mode_id'));
    }
    public function rechargeRequest($value='')
    { 
      $user=Auth::guard('admin')->user();
      $cashbooks=Cashbook::where('user_id',$user->id)->where('status',1)->get();
      return view('admin.wallet.recharge_request',compact('cashbooks')); 
    }
    public function rechargeWalletInCash()
    { 
      $user=Auth::guard('admin')->user();
      $users=User::where('created_by',$user->id)->get();
      return view('admin.wallet.recharge_wallet_in_cash',compact('users')); 
    }
    public function rechargeWalletInCashStore(Request $request)
    { 
      $rules=[  
        "user_id" => 'required', 
        "amount" => 'required', 
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
      DB::select(DB::raw("call up_recharge_wallet_cash ('$user->id','$request->user_id','$request->amount')"));
       $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
    }
    public function rechargeRequestApproval($id)
    {
      $user=Auth::guard('admin')->user();
      DB::select(DB::raw("call up_approve_recharge_request ('$user->id','$id','0')"));
      return redirect()->back()->with(['message'=>'Approved Successfully','class'=>'success']);
    }
    public function rechargeRequestReject($id)
    {  
      $user=Auth::guard('admin')->user();
      DB::select(DB::raw("call up_approve_recharge_request ('$user->id','$id','2')"));
      return redirect()->back()->with(['message'=>'Rejected Successfully','class'=>'success']);
    }
}
