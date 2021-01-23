<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.product.item.category.store',$ItemCategory->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="Item_Category">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Category Name (English)</label>
                            <input type="text" name="category_name_e" class="form-control" maxlength="50" value="{{$ItemCategory->category_name_e}}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Category Name (Hindi)</label>
                            <input type="text" name="category_name_l" class="form-control" maxlength="50" value="{{$ItemCategory->category_name_l}}"> 
                        </div>                               
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Category Code</label>
                            <input type="text" name="category_code" class="form-control" maxlength="5" value="{{$ItemCategory->category_code}}"> 
                        </div>                               
                    </div>
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </div> 
              </form> 
        </div>
    </div>
</div>

