<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Model\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Crypt;  

class ProductController extends Controller
{
    public function itemCategory($value='')
    {   
        $user=Auth::guard('admin')->user();
        $ItemCategorys=ItemCategory::where('user_id',$user->id)->get();
        return view('admin.product.itemCategory.index',compact('ItemCategorys'));
    }
    public function itemCategoryStore(Request $request ,$id=null)
    {    
        $rules=[
         
        'category_name_e' => 'required|max:50',
        'category_name_l' => 'required|max:50',
        'category_code' => 'required|max:5|unique:item_category,category_code,'.$id, 
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
        $ItemCategory = ItemCategory::firstOrNew(['id'=>$id]);
        $ItemCategory->user_id = $user->id;
        $ItemCategory->category_name_e = $request->category_name_e;
        $ItemCategory->category_name_l = $request->category_name_l;
        $ItemCategory->category_code = $request->category_code;
        $ItemCategory->status =1;
        $ItemCategory->save(); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function itemCategoryEdit($id=null)
    {
        
        $ItemCategory=ItemCategory::find(Crypt::decrypt($id));
        return view('admin.product.itemCategory.edit',compact('ItemCategory')); 
    }
    public function addItem($value='')
    {   
        $user=Auth::guard('admin')->user();
        $ItemCategorys=ItemCategory::where('user_id',$user->id)->get();
        return view('admin.product.itemlist.index',compact('ItemCategorys'));
    }
    
}
