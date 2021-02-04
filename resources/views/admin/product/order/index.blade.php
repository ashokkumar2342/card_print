@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Order</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                
               <table class="table table-striped table-bordered">
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
                          <a href="#" title="" class="btn btn-xs btn-info" onclick="return confirm('Are You Sure You Want To Purchase This item?');">Order</a>
                        </td>
                        
                    </tr>
                   @endforeach
                </tbody>
            </table> 
            </div> 
        </div>
    </div> 
    </section>
    @endsection 

