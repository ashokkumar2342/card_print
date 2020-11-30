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

class VoterDetailsController extends Controller
{
    public function index()
    {   
        $districts=District::orderBy('Name_E','ASC')->get();
        return view('admin.voterDetails.index',compact('districts'));
    }
    public function districtWiseAcno(Request $request)
    {   
        $ac_nos=AcDetail::where('d_id',$request->district_id)
                          ->orderBy('AC_NO','ASC')->get();
        return view('admin.voterDetails.ac_no_select_box',compact('ac_nos'));
    }
    public function acnoWisePartno(Request $request)
    {   
        $part_nos=NewPartList::where('AC_No',$request->ac_no)
                          ->orderBy('Part_No','ASC')->get();
        $sections=Section::where('ac_no',$request->ac_no)
                          ->orderBy('s_name_e','ASC')->get();                  
        return view('admin.voterDetails.part_no_select_box',compact('part_nos','sections'));
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
        $voters =DataVoter:: 
                 where('ac_no',$request->ac_no)
               ->where(function($query) use($request){ 
                if (!empty($request->part_no)) {
                $query->where('part_no', 'like','%'.$request->part_no.'%'); 
                }
                if (!empty($request->sections)) {
                $query->where('section', 'like','%'.$request->sections.'%'); 
                }
                if (!empty($request->voter_name)) {
                $query->where('name_e', 'like','%'.$request->voter_name.'%'); 
                }
                if (!empty($request->father_name)) {
                $query->where('f_name_e', 'like','%'.$request->father_name.'%'); 
                }
                if (!empty($request->voter_card_no)) {
                $query->where('cardno', 'like','%'.$request->voter_card_no.'%'); 
                } 
               }) 
               ->orderBy('name_e','ASC')->orderBy('f_name_e','ASC')->take(25)->get(); 
        $response= array();                       
        $response['status']= 1;                       
        $response['data']=view('admin.voterDetails.voter_list_table',compact('voters'))->render();
        return $response;
    }
      
}
