@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Item Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.product.item.category.store') }}" method="post" class="add_form" content-refresh="Item_Category">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Category Name (English)</label>
                            <input type="text" name="category_name_e" class="form-control" maxlength="50"> 
                        </div>                               
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Category Name (Hindi)</label>
                            <input type="text" name="category_name_l" class="form-control" maxlength="50"> 
                        </div>                               
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Category Code</label>
                            <input type="text" name="category_code" class="form-control" maxlength="5"> 
                        </div>                               
                    </div>
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div> 
              </form>  
            </div>
            <div class="col-lg-12 table-responsive">
                <table class="table table-striped table-bordered" id="Item_Category">
                    <thead>
                        <tr>
                            <th>Category Name (English)</th>
                            <th>Category Name (Hindi)</th>
                            <th>Category Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ItemCategorys as $ItemCategory)
                        @php
                            if($ItemCategory->status==1){
                              $color='success';  
                            }else{
                              $color='default';  
                            }
                        @endphp
                        <tr>
                            <td>{{$ItemCategory->category_name_e}}</td>
                            <td>{{$ItemCategory->category_name_l}}</td>
                            <td>{{$ItemCategory->category_code}}</td> 
                            <td>
                                <a class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.product.item.category.edit',Crypt::encrypt($ItemCategory->id)) }}')"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.product.item.category.delete',Crypt::encrypt($ItemCategory->id)) }}" class="btn btn-danger btn-xs" title=""><i class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.product.item.category.status',Crypt::encrypt($ItemCategory->id)) }}" class="btn btn-{{ $color }} btn-xs" title="">Active</a>
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

