<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Model\AadharDetail;
use App\Model\FeedbackUser;
use Storage; 
use Intervention\Image\ImageManager;

class CardPrintController extends Controller
{
    public function index()
    {   
        return view('admin.card_print.index');
    }
    public function show(Request $request)
    {
        $rules=[ 
              'voter_card_no' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

        $appuser = Auth::guard('admin')->user();
        if ($appuser->id>2){
            $wballance = DB::select(DB::raw("select `amt` from `balanceamt` where `userid` = $appuser->id;"));
            $cardrate = DB::select(DB::raw("select `amt` from `charge_per_card` where `userid` = $appuser->id;"));
            if ($wballance[0]->amt<$cardrate[0]->amt) {
                  $response=array();
                  $response["status"]=0;
                  $response["msg"]='Insufficiant Balance, Plz Recharge you Account';
                  return response()->json($response);// response as json  
            }
        }
        
        
        $voterData = DB::select(DB::raw("select * from data_voters `dv` Inner Join `gender_detail` `gd` on `gd`.`code` = `dv`.`gender` where cardno = '$request->voter_card_no';"));
        
        if (empty($voterData)) {
           $response=array();
           $response["status"]=0;
           $response["msg"]='invalid Voter Card No.';
           return response()->json($response);// response as json 
        }

        // if ($appuser->created_by>2){
        //     $acno = $voterData[0]->ac_no;
        //     $partno = $voterData[0]->part_no;
        //     $section_no = $voterData[0]->section;

        //     $voterSection = DB::select(DB::raw("Select * From `sections` where `ac_no` = '$acno' and `part_no` = '$partno' and `section` = '$section_no';"));

        //     $d_id = $voterSection[0]->d_id;
        //     if($d_id!=$appuser->district_id){
        //         $response=array();
        //         $response["status"]=0;
        //         $response["msg"]='Voter Card No. is of Another District';
        //         return response()->json($response);// response as json     
        //     }
        // }  
        
        
        $acno = $voterData[0]->ac_no;
        $partno = $voterData[0]->part_no;
        $vsrno = $voterData[0]->srno; 
        $filename = $acno.'/'.$partno.'/'.$vsrno.'.jpg';
        $image = 'https://voter-image.s3.ap-south-1.amazonaws.com/'.$filename;
        $response= array();                       
        $response['status']= 1;                       
        $response['data']=view('admin.card_print.show',compact('voters','voterData','image'))->render();
        return $response;   
    }
    
    public function print(Request $request)
    {   

        
        // Storage::disk('s3')->setVisibility('1/1/2.jpg', 'public');
        // return $image;

        $path=Storage_path('fonts/');
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir']; 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata']; 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [55, 88],
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
         


        $value=$request->voter_card_no;
        $user=Auth::guard('admin')->user();

        $transaction_status = DB::select(DB::raw("Select `up_deduct_wallet`('$value', $user->id) as `result`;")); 
        if ($transaction_status[0]->result!='success'){
            return redirect()->back()->with(['message'=>$transaction_status[0]->result,'class'=>'error']);
        }
         
        $voterData = DB::select(DB::raw("select * from data_voters `dv` Inner Join `gender_detail` `gd` on `gd`.`code` = `dv`.`gender` Inner Join `rln_detail` `rd` on `rd`.`code` = `dv`.`relation` where cardno = '$value';"));
        
        $acno = $voterData[0]->ac_no;
        $partno = $voterData[0]->part_no;
        $vsrno = $voterData[0]->srno;
        $section_no = $voterData[0]->section;

        $voterSection = DB::select(DB::raw("Select * From `sections` where `ac_no` = '$acno' and `part_no` = '$partno' and `section` = '$section_no';"));

        $teh_id = $voterSection[0]->teh_id;
        $nnn_id = $voterSection[0]->nnn_id;
        $d_id = $voterSection[0]->d_id;

        $tehsils = DB::select(DB::raw("select * from `tahsils` Where `d_id` = '$d_id' and `tahsil_ID` = '$teh_id';"));

        $district = DB::select(DB::raw("Select * From `districts` Where `d_id` = '$d_id';"));

        $ac_list = DB::select(DB::raw("Select * From `ac_detail` Where `ac_no` = '$acno';"));

        $part_detail = DB::select(DB::raw("Select * From `newpartlist` Where `ac_no` = '$acno' and `part_no` = '$partno';"));

        $vcardno = $voterData[0]->cardno;
        $name_l = $voterData[0]->name_l;
        $name_e = $voterData[0]->name_e;
        $rln_l = $voterData[0]->relation_l;
        $rln_e = $voterData[0]->relation_e;
        $rname_l = $voterData[0]->f_name_l;
        $rname_e = $voterData[0]->f_name_e;
        $gender_l = $voterData[0]->gender_l;
        $gender_e = $voterData[0]->gender_e;
        if ($voterData[0]->dob == ''){
            $age_dob = $voterData[0]->age;
        }else{
            $age_dob = $voterData[0]->dob;
        }
        //return($district[0]->Name_l);
        if ($voterSection[0]->r_u == 'R'){
            $add_l = 'म.नं.'.$voterData[0]->hno_l.', गांव-'.$voterSection[0]->s_name_l.', तह-'.$tehsils[0]->Name_l.', जिला-'.$district[0]->Name_l;
            $add_e = 'HNo.'.$voterData[0]->hno_e.', VILL-'.$voterSection[0]->s_name_e.',TEH-'.$tehsils[0]->Name_e.', DIST-'.$district[0]->Name_E;
        }else{
            $add_l = 'म.नं.'.$voterData[0]->hno_l.', '.$voterSection[0]->s_name_l.', तह-'.$tehsils[0]->Name_l.', जिला-'.$district[0]->Name_l;
            $add_e = 'HNo.'.$voterData[0]->hno_e.', '.$voterSection[0]->s_name_e.',TEH-'.$tehsils[0]->Name_e.', DIST-'.$district[0]->Name_E;
        }

        $acno_name_l = $ac_list[0]->AC_NO.'-'.$ac_list[0]->NAME_l1;
        $acno_name_e = $ac_list[0]->AC_NO.'-'.$ac_list[0]->NAME_EN;

        $partno_name_l = $part_detail[0]->Part_No.'-'.$part_detail[0]->Name_l;
        $partno_name_e = $part_detail[0]->Part_No.'-'.$part_detail[0]->Name_e;

        

        $filename = $acno.'/'.$partno.'/'.$vsrno.'.jpg';
        $image = 'https://voter-image.s3.ap-south-1.amazonaws.com/'.$filename;
        $cdate = date("d-m-Y");
        
        $bimage  =\Storage_path('app/image/blank.png');
        if ($request->pre_printed_card==1) {
            $bimage1  =\Storage_path('app/image/front.jpg');
            $bimage2  =\Storage_path('app/image/back.jpg'); 
        }else {
            $bimage1  =\Storage_path('app/image/blank.png');
            $bimage2  =\Storage_path('app/image/blank.png'); 
        }

        list($width, $height, $type, $attr) = getimagesize($image);
        
        if ($width> 88) {
            $height = (88/$width)*$height;
            $width = 88;
        }
        if ($height> 117) {
            $width = (117/$height)*$width;
            $height = 117;
        } 

        if (strlen($vcardno) == 10){
            $bcheight = 0.8;
            $bcsize = 0.8;
        }else{
            $bcheight = 1;
            $bcsize = 0.5;
        }

        $signimg = \Storage_path('app/image/sign/'.$acno.'.png');

        // $width = 88;
        // $height = 117;

        $epicbackground = $request->pre_printed_card;
        $html = view('admin.card_print.print',compact('vcardno', 'image', 'width', 'height', 'name_l', 'name_e', 'rln_l', 'rln_e', 'rname_l', 'rname_e', 'gender_l', 'gender_e', 'age_dob', 'add_l', 'add_e', 'acno_name_l', 'acno_name_e', 'partno_name_l', 'partno_name_e', 'cdate', 'bimage', 'bcheight', 'bcsize', 'signimg','bimage1','bimage2','epicbackground'));
        $mpdf->WriteHTML($html); 
        $mpdf->Output();
    }



//-------Aadhaar-print--------------------------
    public function adhaar()
    { 
      $appuser = Auth::guard('admin')->user();  
      $AadharDetails=AadharDetail::where('user_id',$appuser->id)->get();       
      return view('admin.card_print.adhaar',compact('AadharDetails'));    
    }


    public function adhaarStore(Request $request)
    {   
        $rules=[ 
              'adhaar_card' => 'required',  
              'password' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $appuser = Auth::guard('admin')->user();


        // // $transaction_status = DB::select(DB::raw("Select `up_deduct_wallet_aadhar`('$request->adhaar_card', $user->id) as `result`;")); 
        // if ($transaction_status[0]->result!='success'){
        //     return redirect()->back()->with(['message'=>$transaction_status[0]->result,'class'=>'error']);
        // }
        
        $transaction_status = DB::select(DB::raw("Select `check_wallet_balance_print`($appuser->id, 2) as `result`;")); 
        if ($transaction_status[0]->result!='ok'){
            $response=array();
            $response["status"]=0;
            $response["msg"]=$transaction_status[0]->result;
            return response()->json($response);
        }

        $name =date('Ymdhis');
        $vpath = '/adhaar/'.$appuser->id.'/'.$name.'/';
        @mkdir($dirpath, 0755, true); 
        $pdf_file=$request->adhaar_card;
        $imagedata = file_get_contents($pdf_file);
        $encode = base64_encode($imagedata);
        $pdf_file=base64_decode($encode);
        
        $pdf_file= \Storage::disk('local')->put($vpath.$name.'.pdf', $pdf_file);


        $destinationPath = storage_path('app'.$vpath);
        $pdfbox = base_path('pdfbox-app.jar');
        $pdf = $destinationPath.$name.'.pdf';
        $outpdf = $destinationPath.$name.'_o.pdf';
        exec("java -jar ".$pdfbox." Decrypt -password ".$request->password." ".$pdf." ".$outpdf);
        if(file_exists($outpdf)!=1){
            $response=array();
            $response["status"]=0;
            $response["msg"]='Please Enter Correct Password';
            return response()->json($response);
        }
        
        exec("java -jar ".$pdfbox." Decrypt -password ".$request->password." ".$pdf);
        exec("java -jar ".$pdfbox." ExtractText ".$pdf);
        exec("java -jar ".$pdfbox." ExtractImages ".$pdf);

        


        // create an image manager instance with favored driver
        $manager = new ImageManager();

        // to finally create image instances
        $image = $manager->make($destinationPath.$name.'-8.jpg');
        $image->brightness(25);
        $image->contrast(30);
        $image->save($destinationPath.$name.'_photo.jpg');    
        


        $filename = \Storage_path('app'.$vpath.$name.'.txt');
        $fp = fopen($filename, "r");

        $content = fread($fp, filesize($filename));
        $lines = explode("\n", $content);
        fclose($fp);
        
        $lineno = 0;
        $mobile_no = '';
        while ($lineno <= 15) {
            if($this->check_mobile_no(trim($lines[$lineno])) == 1){
                $mobile_no = $lines[$lineno];
                $lineno = 15;    
            }
            $lineno = $lineno + 1;
        }

        $lineno = 0;
        $aadhar_no = '';
        while ($lineno <= 16) {
            if($this->check_aadhar_no(trim($lines[$lineno])) == 1){
                $aadhar_no = str_replace(' ', '', trim($lines[$lineno]));
                $lineno = 16;    
            }
            $lineno = $lineno + 1;
        }
        

        $transaction_status = DB::select(DB::raw("Select `up_deduct_wallet_card_print`($aadhar_no, $appuser->id, 2) as `result`;")); 
        if ($transaction_status[0]->result!='success'){
            $response=array();
            $response["status"]=0;
            $response["msg"]=$transaction_status[0]->result;
            return response()->json($response);
        }

        $AadharDetail = new AadharDetail();
        $AadharDetail->user_id = $appuser->id;
        $AadharDetail->file_path = $vpath;
        $AadharDetail->file_name = $name.'.pdf';
        $AadharDetail->file_password = $request->password;
        $AadharDetail->upload_date = date('Y-m-d');
        $AadharDetail->name_e = $lines[3];
        $AadharDetail->mobile_no = $mobile_no;
        $AadharDetail->aadhar_no = $aadhar_no;
        $AadharDetail->save();

        $this->process_aadhar_card_info($vpath, $name);

        $response=['status'=>1,'msg'=>'Upload Successfully'];
            return response()->json($response);        

    }

    public function check_mobile_no($text) 
    {
        $ismobile = 1;
        if (strlen($text) == 10)
        {
            for ($i=0; $i <10 ; $i++) { 
                if (ord(substr($text, $i,1))<48 || ord(substr($text, $i,1))>57){
                    $ismobile = 0;
                }
            }
        }else{
            $ismobile = 0;
        }
        return $ismobile;
    }

    public function check_aadhar_no($text) 
    {
        $text = str_replace(' ', '', $text);
        $isaadhar = 1;
        if (strlen($text) == 12)
        {
            for ($i=0; $i <10 ; $i++) { 
                if (ord(substr($text, $i,1))<48 || ord(substr($text, $i,1))>57){
                    $isaadhar = 0;
                }
            }
        }else{
            $isaadhar = 0;
        }
        return $isaadhar;
    }

    public function process_aadhar_card_info($vpath, $name)
    {
        $destinationPath = storage_path('app'.$vpath);
        $pdfbox = base_path('pdfbox-app.jar');
        $pdf = $destinationPath.$name.'.pdf';
        

        exec("java -jar ".$pdfbox." PDFToImage -imageType png -dpi 300 -cropbox 33 110 48 233 ".$pdf);

        Storage::copy($vpath.$name."1.png",$vpath.$name."_1.png");


        exec("java -jar ".$pdfbox." PDFToImage -imageType png -dpi 300 -cropbox 48 110 255 233 ".$pdf);

        Storage::copy($vpath.$name."1.png",$vpath.$name."_2.png");

        exec("java -jar ".$pdfbox." PDFToImage -imageType png -dpi 300 -cropbox 255 110 292 233 ".$pdf);

        Storage::copy($vpath.$name."1.png",$vpath.$name."_3.png");
        


        exec("java -jar ".$pdfbox." PDFToImage -imageType png -dpi 300 -cropbox 303 110 562 233 ".$pdf);
        Storage::copy($vpath.$name."1.png",$vpath.$name."_4.png");

    }    

    public function adhaarStoreDownload(Request $request)
    {
        
        

        $path=Storage_path('fonts/');
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir']; 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata']; 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [88, 55],
             'fontDir' => array_merge($fontDirs, [
                 __DIR__ . $path,
             ]),
             'fontdata' => $fontData + [
                 'frutiger' => [
                     'R' => 'FreeSans.ttf',
                     'I' => 'FreeSansOblique.ttf',
                 ]
             ],
             'default_font' => 'freesans'
         ]);
         


        $opt_print_background = $request->background;
        $opt_print_mobile = $request->mobile_no;
        $opt_print_dates = $request->download_date;
        $opt_print_tagline = $request->tag_line;
        $ad_id = $request->id;
        $user=Auth::guard('admin')->user();

        $aadharData = DB::select(DB::raw("select * from aadhar_details where `id` = $ad_id;"));
        
        $files_path  =\Storage_path('app'.$aadharData[0]->file_path);
        $bg_files_path  =\Storage_path('app/adhaar/backgroud_files/');
        $files_name  =substr($aadharData[0]->file_name, 0,14);

        $html = view('admin.card_print.print_adhar',compact('ad_id', 'files_path', 'files_name', 'bg_files_path', 'opt_print_background', 'opt_print_mobile', 'opt_print_dates', 'opt_print_tagline', 'aadharData'));
        $mpdf->WriteHTML($html); 
        $mpdf->Output();   
    } 

    function  output ( $message )
    {
        if  ( php_sapi_name ( )  ==  'cli' )
        echo ( $message ) ;
        else
        echo ( nl2br ( $message ) ) ;
    }


    public function adhaarPrintPurchase()
    {
       return view('admin.card_print.adhaar_print_purchase');  
    }
    public function adhaarPrintPurchaseStore(Request $request)
    {
        $this->validate($request, [
         'I_Want_To_Purchase' => 'required',             
          
      ]); 
        $appuser = Auth::guard('admin')->user();      
        $datas=DB::select(DB::raw("select `up_deduct_wallet_package_lifetime`($appuser->id, 2) as `result`;")); 
        return Redirect()->back()->with(['message'=>$datas[0]->result,'class'=>'success']); 
        
    }
    public function adhaarPrintFeedback($value='')
    {
        $appuser = Auth::guard('admin')->user();
        $FeedbackUser=FeedbackUser::where('user_id',$appuser->id)->first();
        return view('admin.card_print.feedback_form',compact('FeedbackUser')); 
    }
    public function adhaarPrintFeedbackStore(Request $request)
    {
        $rules=[ 
          'message' => 'required',       
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $appuser = Auth::guard('admin')->user();
        $FeedbackUser=FeedbackUser::firstOrNew(['user_id'=>$appuser->id]);
        $FeedbackUser->user_id=$appuser->id;
        $FeedbackUser->ondate=date('Y-m-d');
        $FeedbackUser->service_type=2;
        $FeedbackUser->rating=$request->r1;
        $FeedbackUser->remarks=$request->message;
        $FeedbackUser->save();
        $response=['status'=>1,'msg'=>'Send Successfully'];
            return response()->json($response);
    }
    

}
