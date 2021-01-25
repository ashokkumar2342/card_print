<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ItemCategory;
use App\Model\ItemList;
use App\Model\ItemPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;  

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
         
        'category_name_e' => 'required|max:200',
        'category_name_l' => 'required|max:200',
        'category_code' => 'required|max:15|unique:item_category,category_code,'.$id, 
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
        $ItemLists=ItemList::where('user_id',$user->id)->get();
        $ItemCategorys=ItemCategory::where('user_id',$user->id)->get();
        return view('admin.product.itemlist.index',compact('ItemLists','ItemCategorys'));
    }
    public function addItemStore(Request $request ,$id=null)
    {     
        $rules=[
         
        'category_name' => 'required',
        'item_name_e' => 'required|max:200',
        'item_name_l' => 'required|max:200', 
        'item_code' => 'required|max:15|unique:item_list,item_code,'.$id, 
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
        $ItemList = ItemList::firstOrNew(['id'=>$id]);
        $ItemList->user_id = $user->id;
        $ItemList->category_id = $request->category_name;
        $ItemList->item_name_e = $request->item_name_e;
        $ItemList->item_name_l = $request->item_name_l;
        $ItemList->item_code = $request->item_code;
        $ItemList->gross_price = $request->gross_price;
        $ItemList->net_price = $request->net_price;
        $ItemList->discount_type = $request->discount_type;
        $ItemList->discount_percentage = $request->discount_percentage;
        $ItemList->discount_fix = $request->discount_fix;
        $ItemList->stock_qty = $request->stock_qty;
        $ItemList->remarks = $request->remarks;
        $ItemList->status =1;
        $ItemList->save(); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function addItemImage($value='')
    {   
        $user=Auth::guard('admin')->user();
        $ItemLists=ItemList::where('user_id',$user->id)->get();
        $ItemPhotos=ItemPhoto::where('user_id',$user->id)->get();
        return view('admin.product.itemlist.add_image',compact('ItemLists','ItemPhotos')); 
    }
    public function addItemImageStore(Request $request)
    {   
        $rules=[ 
        'item_name' => 'required',
        'item_image' => 'required|mimes:jpeg,png,jpg', 
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
        
        $vpath = '/product/'.$user->id.'/'.$request->item_name.'/';
        @mkdir($dirpath, 0755, true);

        foreach ($request->item_image as $key => $image) {
            $image=$image;
            $imagedata = file_get_contents($image);
            $encode = base64_encode($imagedata);
            $image=base64_decode($encode);
            $name =time().rand(2,1000000); 
            $image= \Storage::disk('local')->put($vpath.$name.'.jpg', $image); 
            $ItemPhoto = new ItemPhoto();
            $ItemPhoto->user_id = $user->id;
            $ItemPhoto->item_id = $request->item_name;
            $ItemPhoto->file_path = $vpath;
            $ItemPhoto->file_name = $name.'.jpg';
            $ItemPhoto->status =1;
            $ItemPhoto->save(); 
        }
        $response=['status'=>1,'msg'=>'Upload Successfully'];
            return response()->json($response); 
    }
    public function addItemImageShow($id)
    {
      $id=Crypt::decrypt($id);
      $ItemPhoto =ItemPhoto::find($id);
      $storagePath = storage_path('app'.$ItemPhoto->file_path.'/'.$ItemPhoto->file_name);              
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
    public function addItemImageDelete($id)
    {
        $id=Crypt::decrypt($id);
        $ItemPhoto =ItemPhoto::find($id);
        $storagePath = storage_path('app'.$ItemPhoto->file_path.'/'.$ItemPhoto->file_name); 
        if(File::exists($storagePath)) {
            File::delete($storagePath);
        }
        $ItemPhoto->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    
}
