@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Items Image</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.product.add.item.image.store') }}" method="post" class="add_form" content-refresh="Item_Category" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Item Name</label>
                            <select name="item_name" class="form-control select2">
                                <option selected disabled>Select Item Name</option> 
                                @foreach ($ItemLists as $ItemList)
                                <option value="{{ $ItemList->id }}">{{ $ItemList->item_code }}-{{ $ItemList->item_name_e }}</option> 
                                @endforeach
                            </select>
                        </div>                               
                    </div>
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Items Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="item_image[]" class="custom-file-input" id="exampleInputFile" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                  </div> 
                                </div>
                              </div>
                        </div> 
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div> 
              </form>  
            </div>
            <table class="table table-striped table-bordered" id="Item_Category">
                <thead>
                    <tr>  
                        <th>Item Name</th> 
                        <th>Image</th> 
                        <th>Action</th> 
                        
                    </tr>
                </thead>
                <tbody>
                   @foreach ($ItemPhotos as $ItemPhoto) 
                    <tr> 
                        <td>{{ $ItemPhoto->Items->item_name_e or '' }}</td>
                        <td><img src="{{ route('admin.product.add.item.image.show',Crypt::encrypt($ItemPhoto->id)) }}"  height="100px" width="100px" /></td>
                        <td>
                          <a href="{{ route('admin.product.add.item.image.delete',Crypt::encrypt($ItemPhoto->id)) }}" title="" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure You Want To Purchase This item?');"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>
                   @endforeach
                </tbody>
            </table>  
        </div>
    </div> 
    </section>
    @endsection 
@push('scripts')
<script>
 
$(function () {
  bsCustomFileInput.init();
});
 
</script>
@endpush

