<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cashbook;
use App\Model\PaymentMode;
use App\Model\PaymentOption;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator;  
use Carbon;

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
      $user=Auth::guard('admin')->user();
      if ($user->created_by == 0) {

          $payment_mode_id_arr=PaymentOption::whereIn('user_id',[1,2])->where('status',1)->pluck('payment_mode_id')->toArray();
      }else{
          $payment_mode_id_arr=PaymentOption::where('user_id',$user->created_by)->where('status',1)->pluck('payment_mode_id')->toArray();
      }
      $paymentModes=PaymentMode::whereIn('id',$payment_mode_id_arr)->get(); 
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
    public function qrcodeShow(Request $request,$path)
    {  
      $path=Crypt::decrypt($path);
      $storagePath = storage_path('app/'.$path);              
      $mimeType = mime_content_type($storagePath); 
      if( ! \File::exists($storagePath)){

        return view('error.home');
      }
      $headers = array(
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline; '
      );            
      return Response::make(file_get_contents($storagePath), 200, $headers);     
    } 
    public function cashbookReport(Request $request)
    {  
      $rules=[  
        "date_range" => 'required',  
      ]; 
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      $user =Auth::guard('admin')->user();
      $date_range= explode('-',$request->date_range);
      $from_date = date('Y-m-d H:i:s',strtotime($date_range[0]));
      $to_date =  date('Y-m-d H:i:s',strtotime($date_range[1]));
      $cashbooks = Cashbook::whereBetween('transaction_date_time',array($from_date,$to_date))->where('user_id',$user->id)->get();
      $response =array();
      $response['status']=1;
      $response['data']=  view('admin.wallet.report_table',compact('cashbooks'))->render();
      return $response;
    }
    public function rechargeRequest($value='')
    { 
      $user=Auth::guard('admin')->user();
      $cashbooks=DB::select(DB::raw("Select concat(`u`.`email`,' - ', `u`.`mobile`) as `uname`, `pm`.`name`, `cb`.`transaction_date_time`, `cb`.`transaction_no`, `cb`.`camount`, `cb`.`id`
        From `users` `u` 
        Inner Join `cashbook` `cb` on `cb`.`user_id` = `u`.`id`
        Inner join `payment_mode` `pm` on `pm`.`id` = `cb`.`payment_mode_id`
        Where `u`.`created_by` =$user->id and `cb`.`status` = 1 Order By `cb`.`transaction_date_time`, `pm`.`name`;"));
       
      return view('admin.wallet.recharge_request',compact('cashbooks')); 
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
      $message=DB::select(DB::raw("call up_recharge_wallet_cash ('$user->id','$request->user_id','$request->amount')"));
      if ($message[0]->result=='success') {
        $response=['status'=>1,'msg'=>$message[0]->result]; 
      }else{
        $response=['status'=>0,'msg'=>$message[0]->result]; 
      }
      return response()->json($response); 
    }
}
