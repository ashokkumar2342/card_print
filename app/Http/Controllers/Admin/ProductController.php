<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\ItemCategory;
use App\Model\ItemList;
use App\Model\ItemPhoto;
use App\Model\OrderAddress;
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
    public function itemCategoryStatus($id)
    {
        $id=Crypt::decrypt($id); 
        $ItemCategory=ItemCategory::find($id);
        if ($ItemCategory->status==1) {
            $ItemCategory->status=0;    
            
        }else{
            $ItemCategory->status=1;
        }
        $ItemCategory->save();
        return redirect()->back()->with(['message'=>'Status Change Successfully','class'=>'success']); 

    }
    public function itemCategoryDelete($id)
    {
        $id=Crypt::decrypt($id); 
        $ItemCategory=ItemCategory::find($id);
       
        $ItemCategory->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']); 

    }
    public function addItem($value='')
    {   
        $user=Auth::guard('admin')->user();
        $ItemLists=ItemList::where('user_id',$user->id)->get();
        $ItemCategorys=ItemCategory::where('user_id',$user->id)->where('status',1)->get();
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
        $ItemList->description = $request->description;
        $ItemList->status =1;
        $ItemList->save(); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
    public function addItemEdit($id)
    { 
        $id=Crypt::decrypt($id);
        $user=Auth::guard('admin')->user();
        $ItemCategorys=ItemCategory::where('user_id',$user->id)->get();
        $ItemList=ItemList::find($id);
        return view('admin.product.itemlist.edit',compact('ItemCategorys','ItemList'));  
    }
    public function addItemStatus($id)
    {
        $id=Crypt::decrypt($id); 
        $ItemList=ItemList::find($id);
        if ($ItemList->status==1) {
            $ItemList->status=0;    
            
        }else{
            $ItemList->status=1;
        }
        $ItemList->save();
        return redirect()->back()->with(['message'=>'Status Change Successfully','class'=>'success']); 

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
        'item_image' => 'required', 
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
    public function productList()
    { 
        $user=Auth::guard('admin')->user();
        $ItemLists=ItemList::where('status',1)->get(); 
        return view('admin.product.cart.product_list',compact('ItemLists')); 
    }
    public function productImage($id)
    { 
         $id=Crypt::decrypt($id);
         $ItemPhoto =ItemPhoto::where('item_id',$id)->first();
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
    public function productView($id)
    {   
        $id=Crypt::decrypt($id); 
        $ItemList=ItemList::find($id);
        $ItemPhotos=ItemPhoto::where('item_id',$id)->get();
        return view('admin.product.cart.product_view',compact('ItemList','ItemPhotos')); 
    } 
    public function cartStore($id)
    {   
        $id=Crypt::decrypt($id); 
        $user =Auth::guard('admin')->user();
        $ItemList=ItemList::find($id);
        $carts=Cart::where('item_id',$id)->first();
        if (is_null($carts)) {
             $cart=new Cart();
             $cart->user_id =$user->id;
             $cart->item_id =$ItemList->id; 
             $cart->qty = 1;
             $cart->amt =$ItemList->net_price;
             $cart->save();   
        }else{
            $cart=Cart::where('item_id',$id)->first();
            $cart->user_id =$user->id;
            $cart->item_id =$ItemList->id; 
            $cart->qty = $cart->qty + 1;
            $cart->amt =$ItemList->net_price;
            $cart->save();
        }
       
        $response=['status'=>1,'msg'=>'Cart Add Successfully'];
        return response()->json($response);  
    }
    public function cartView()
    {   
        $user_id =Auth::guard('admin')->user()->id; 
        $carts=Cart::where('user_id',$user_id)->get(); 
        return view('admin.product.cart.cart',compact('carts')); 
    }
    public function cartCount()
    {   
        $user_id =Auth::guard('admin')->user()->id; 
        $carts=Cart::where('user_id',$user_id)->get(); 
        return view('admin.product.cart.count',compact('carts')); 
    }
    public function cartDelete($id)
    {   
        $id=Crypt::decrypt($id);
        
        $cart=Cart::find($id); 
        if (!is_null($cart)) {
            $cart->delete(); 
        }
        
        return redirect()->back()->with(['message'=>"Item Remove Successfully",'class'=>'success']); 
    }
    public function cartUpdate($id,$type)
    {   
        $id=Crypt::decrypt($id);
        $type=Crypt::decrypt($type);
        $cart=Cart::find($id);
        if ($type==1) {
            $cart->qty = $cart->qty + 1;
        }else{
            if ($cart->qty > 1) {
                $cart->qty = $cart->qty - 1; 
            }
           
        } 
        $cart->save();  
        
        return redirect()->route('admin.cart.view')->with(['message'=>"Item Update Successfully",'class'=>'success']); 
    }

    public function checkout(Request $request)
    {
       $user_id =Auth::guard('admin')->user()->id;  
       $carts=Cart::where('user_id',$user_id)->get();
       return view('admin.product.cart.checkout',compact('carts'));  
    }
    public function checkoutStore(Request $request)
    {    
        $rules=[ 
        'mobile_no' => 'required',
        'address' => 'required', 
        'city' => 'required', 
        'state' => 'required', 
        'pincode' => 'required', 
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
        $OrderAddress= OrderAddress::firstOrNew(['user_id'=>$user->id]);  
        $OrderAddress->user_id=$user->id;  
        $OrderAddress->mobile_no=$request->mobile_no;  
        $OrderAddress->address_line1=$request->address;  
        $OrderAddress->city=$request->city;  
        $OrderAddress->state=$request->state;  
        $OrderAddress->pin_code=$request->pincode;  
        $OrderAddress->save(); 
        $response=['status'=>1,'msg'=>'Successfully'];
            return response()->json($response); 
    }


    public function orderList($value='')
    {
        return view('admin.product.order.list',compact('amount','OrderAddress'));    
    }
    
}
