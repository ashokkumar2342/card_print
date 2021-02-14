<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
             <form action="{{ route('admin.product.add.item.store',$ItemList->id) }}" method="post" class="add_form" content-refresh="Item_Category" button-click="btn_close">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_name" class="form-control select2">
                                <option selected disabled>Select Category Name</option> 
                                @foreach ($ItemCategorys as $ItemCategory)
                                <option value="{{ $ItemCategory->id }}" {{ $ItemList->category_id==$ItemCategory->id?'selected':'' }}>{{ $ItemCategory->category_code }}-{{ $ItemCategory->category_name_e }}</option> 
                                @endforeach
                            </select>
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Name (English)</label>
                            <input type="text" name="item_name_e" class="form-control" maxlength="50" value="{{ $ItemList->item_name_e }}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Name (Hindi)</label>
                            <input type="text" name="item_name_l" class="form-control" maxlength="50" value="{{ $ItemList->item_name_l }}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Code</label>
                            <input type="text" name="item_code" class="form-control" maxlength="5" value="{{ $ItemList->item_code }}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Gross Price</label>
                            <input type="text" name="gross_price" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $ItemList->gross_price }}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Net Price</label>
                            <input type="text" name="net_price" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $ItemList->net_price }}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select name="discount_type" class="form-control">
                                 <option value="1">Percentage</option>
                                 <option value="2"{{ $ItemList->discount_type==2?'selected':'' }}>Fix</option> 
                             </select> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Dis. Percentage</label>
                            <input type="text" name="discount_percentage" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $ItemList->discount_percentage }}">
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Discount Fix</label>
                            <input type="text" name="discount_fix" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $ItemList->discount_fix }}">
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Stock Quantity</label>
                            <input type="text" name="stock_qty" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $ItemList->stock_qty }}">
                        </div>                               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea name="remarks" class="form-control">{{ $ItemList->remarks }}</textarea>
                        </div>                               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $ItemList->description }}</textarea>
                        </div>                               
                    </div>
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div> 
              </form>
        </div>
    </div>
</div>

