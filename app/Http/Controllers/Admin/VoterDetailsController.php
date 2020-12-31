<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcDetail;
use App\Model\DataVoter;
use App\Model\District;
use App\Model\NewPartList;
use App\Model\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;  

class VoterDetailsController extends Controller
{
    public function index()
    {   
      $user =Auth::guard('admin')->user();
      $districts = District::orderBy('Name_E', 'ASC')->get();
      // if($user->created_by<=2){
      //   $districts = District::orderBy('Name_E', 'ASC')->get();
      // }else{
      //   $districts = District::where('d_id',$user->district_id)->orderBy('Name_E', 'ASC')->get();
      // }
      return view('admin.voterDetails.index',compact('districts'));
    }
    public function districtWiseAcno(Request $request)
    {   
        $ac_nos=AcDetail::where('d_id',$request->district_id)
                          ->orderBy('AC_NO','ASC')->get();
        return view('admin.voterDetails.ac_no_select_box',compact('ac_nos'));
    }
    public function acnoWiseVillage(Request $request)
    {  
      $villages = DB::select(DB::raw("select Distinct trim(`Name_e`) as `vilname` from `newpartlist` where `AC_No` = $request->ac_no Order By trim(`Name_e`);"));
        return view('admin.voterDetails.village_select_box',compact('villages'));
    } 
    public function voterSearch(Request $request)
    { 
        $rules=[ 
              'district' => 'required', 
              'ac_no' => 'required', 
              
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
          if ($request->voter_name==null && $request->father_name==null && $request->voter_card_no==null) {
              $response=array();
              $response["status"]=0;
              $response["msg"]='Please Enter Either Name or F/H Name or EPIC No.';
              return response()->json($response);// response as json  
          }


          $appuser = Auth::guard('admin')->user();
          if ($appuser->id > 2){
            $wballance = DB::select(DB::raw("select `amt` from `balanceamt` where `userid` = $appuser->id;"));
            $cardrate = DB::select(DB::raw("select `amt` from `charge_per_card` where `userid` = $appuser->id;"));
            if ($wballance[0]->amt<$cardrate[0]->amt) {
                $response=array();
                $response["status"]=0;
                $response["msg"]='Insufficiant Balance, Plz Recharge you Account';
                return response()->json($response);// response as json  
            }
          }

        // $voters =DataVoter:: 
        //          where('ac_no',$request->ac_no)
        //        ->where(function($query) use($request){ 
        //         if (!empty($request->part_no)) {
        //         $query->where('part_no', 'like','%'.$request->part_no.'%'); 
        //         }
        //         if (!empty($request->sections)) {
        //         $query->where('section', 'like','%'.$request->sections.'%'); 
        //         }
        //         if (!empty($request->voter_name)) {
        //         $query->where('name_e', 'like','%'.$request->voter_name.'%'); 
        //         }
        //         if (!empty($request->father_name)) {
        //         $query->where('f_name_e', 'like','%'.$request->father_name.'%'); 
        //         }
        //         if (!empty($request->voter_card_no)) {
        //         $query->where('cardno', 'like','%'.$request->voter_card_no.'%'); 
        //         } 
        //        }) 
        //        ->orderBy('name_e','ASC')->orderBy('f_name_e','ASC')->take(25)->get();

        $condition ='';
        if (!empty($request->village)) {
          $condition = $condition. " and `npl`.`Name_e` = '$request->village'"; 
        }
        if (!empty($request->voter_name)) {
          $text = str_replace("'", "", $request->voter_name);
          $condition = $condition. " and `dv`.`name_e` like '%$text%'"; 
        }
        if (!empty($request->father_name)) {
          $text = str_replace("'", "", $request->father_name);
          $condition = $condition. " and `dv`.`f_name_e` like '%$text%'"; 
        }
        if (!empty($request->voter_card_no)) {
          $text = str_replace("'", "", $request->voter_card_no);
          $condition = $condition. " and `dv`.`cardno` like '%$text%'"; 
        }
        $orderby = " Order By `dv`.`name_e`, `dv`.`f_name_e` limit 25;";
        $voters = DB::select(DB::raw("Select `dv`.`name_e`, `dv`.`f_name_e`, `dv`.`cardno`, `dv`.`gender`, `dv`.`age`, `dv`.`mobile` From `data_voters` `dv` Inner Join `newpartlist` `npl` on `npl`.`AC_No` = `dv`.`ac_no` and `npl`.`Part_No` = `dv`.`part_no` Where `dv`.`ac_no` = $request->ac_no $condition $orderby"));

        
        $response= array();                       
        $response['status']= 1;                       
        $response['data']=view('admin.voterDetails.voter_list_table',compact('voters'))->render();
        return $response;
    }
      
}
