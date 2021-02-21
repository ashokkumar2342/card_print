@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Items</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.product.add.item.store') }}" method="post" class="add_form" content-refresh="Item_Category">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_name" class="form-control select2">
                                <option selected disabled>Select Category Name</option> 
                                @foreach ($ItemCategorys as $ItemCategory)
                                <option value="{{ $ItemCategory->id }}">{{ $ItemCategory->category_code }}-{{ $ItemCategory->category_name_e }}</option> 
                                @endforeach
                            </select>
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Name (English)</label>
                            <input type="text" name="item_name_e" class="form-control" maxlength="50"> 
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Name (Hindi)</label>
                            <input type="text" name="item_name_l" class="form-control" maxlength="50"> 
                        </div>                               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Item Code</label>
                            <input type="text" name="item_code" class="form-control" maxlength="5"> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Gross Price</label>
                            <input type="text" name="gross_price" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Net Price</label>
                            <input type="text" name="net_price" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select name="discount_type" class="form-control">
                                 <option value="1">Percentage</option>
                                 <option value="2">Fix</option> 
                             </select> 
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Discount Percentage</label>
                            <input type="text" name="discount_percentage" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Discount Fix</label>
                            <input type="text" name="discount_fix" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>                               
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Stock Quantity</label>
                            <input type="text" name="stock_qty" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>                               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea name="remarks" class="form-control"></textarea>
                        </div>                               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
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
                            <th>Category Name</th>
                            <th>Item Name (English)</th>
                            <th>Item Name (Hindi)</th>
                            <th>Item Code</th>
                            <th>Gross Price</th>
                            <th>Net Price</th>
                            <th>Discount Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ItemLists as $ItemList)
                        @php
                            if($ItemList->status==1){
                              $color='success';  
                            }else{
                              $color='default';  
                            }
                        @endphp
                        <tr>
                            <td>{{$ItemList->Category->category_name_e or ''}}</td>
                            <td>{{$ItemList->item_name_e}}</td>
                            <td>{{$ItemList->item_name_l}}</td>
                            <td>{{$ItemList->item_code}}</td> 
                            <td>{{$ItemList->gross_price}}</td> 
                            <td>{{$ItemList->net_price}}</td> 
                            <td>{{$ItemList->discount_type==1?'Percentage':'Fix'}}</td> 
                            <td>
                                <a class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.product.add.item.edit',Crypt::encrypt($ItemList->id)) }}')"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.product.add.item.status',Crypt::encrypt($ItemList->id)) }}" class="btn btn-{{ $color }} btn-xs" title="">Active</a>
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

