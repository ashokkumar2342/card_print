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
       return view('admin.wallet.payment_option',compact('paymentModes'));  
    }
    public function paymentOptionChange(Request $request)
    {
       $paymentmodeid=$request->id;
       return view('admin.wallet.payment_option_form',compact('paymentmodeid'));
    }
    public function paymentOptionStore(Request $request)
    {   
    	$rules=[  
        "payment_mode" => 'required', 
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
       $PaymentOption=new PaymentOption();
       $PaymentOption->user_id=$user->id;
       $PaymentOption->payment_mode_id=$request->payment_mode; 
       $PaymentOption->account_no=$request->account_no;
       $PaymentOption->ifsc_code=$request->ifsc_code;
       $PaymentOption->bank_name=$request->bank_name;
       $PaymentOption->branch_name=$request->branch_name;
       $PaymentOption->save();
       //--start-image-save
	    $dirpath = Storage_path() . '/app/qrcode/'.$PaymentOption->id;
	    $vpath = '/qrcode/'.$PaymentOption->id;
	    @mkdir($dirpath, 0755, true);
	    $file =$request->qr_code;
	    $imagedata = file_get_contents($file);
	    $encode = base64_encode($imagedata);
	    $image=base64_decode($encode); 
	    $name =$PaymentOption->id;
	    $image= \Storage::disk('local')->put($vpath.'/'.$name.'.jpg',$image);
	    //--end-image-save 
       $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
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
       $Cashbook=new Cashbook();
       $Cashbook->user_id=$user->id; 
       $Cashbook->payment_mode_id=$request->payment_mode;
       $Cashbook->amount=$request->amount;
       $Cashbook->transaction_no=$request->transaction_no;
       $Cashbook->transaction_date_time=$request->transaction_date_time;
       $Cashbook->payment_type=$request->payment_type;
       $Cashbook->balance=$request->balance;
       $Cashbook->remarks=$request->remarks;
       $Cashbook->status=0;
       $Cashbook->save();
       $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function rechargeWallet()
    {  
        	 
       return view('admin.wallet.recharge_wallet',compact('paymentModes'));  
    }  
}
