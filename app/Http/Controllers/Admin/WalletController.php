<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cashbook;
use App\Model\PaymentMode;
use App\Model\PaymentOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  

class WalletController extends Controller
{
    public function paymentOption()
    {  
       $paymentModes=PaymentMode::all();	 
       $paymentOptions=PaymentOption::all();   
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
}
