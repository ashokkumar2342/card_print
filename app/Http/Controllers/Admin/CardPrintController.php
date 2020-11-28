<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;  

class CardPrintController extends Controller
{
    public function index()
    {   
        return view('admin.card_print.index');
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
        // $user=Auth::guard()->user();

        // $transaction_status = DB::select(DB::raw("Select `up_deduct_wallet`('$value', $user->id) as `result`;")); 
         
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

        $signimg = \Storage_path('app/image/sign/64.jpg');

        // $width = 88;
        // $height = 117;

        $html = view('admin.card_print.print',compact('vcardno', 'image', 'width', 'height', 'name_l', 'name_e', 'rln_l', 'rln_e', 'rname_l', 'rname_e', 'gender_l', 'gender_e', 'age_dob', 'add_l', 'add_e', 'acno_name_l', 'acno_name_e', 'partno_name_l', 'partno_name_e', 'cdate', 'bimage', 'bcheight', 'bcsize', 'signimg'));
        $mpdf->WriteHTML($html); 
        $mpdf->Output();
    }  
}
