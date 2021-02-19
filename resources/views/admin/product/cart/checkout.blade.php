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
        <form action="{{ route('admin.cart.checkout.store') }}" method="post" class="add_form"> 
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Delivery Address</h3>
              </div>
              <div class="card-body row">
                <!-- Color Picker -->
                <div class="form-group col-lg-6">
                  <label>Name</label>
                  <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" name="name" value="{{ @$OrderAddress->name }}">
                </div> 
                <div class="form-group col-lg-6">
                  <label>Mobile No.</label> 
                  <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                    <input type="text" class="form-control" data-original-title="" name="mobile_no" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$OrderAddress->mobile_no }}">  
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div> 
                </div>  
                  <div class="form-group col-lg-12">
                    <label>Address</label> 
                    <textarea class="form-control" name="address" maxlength="200">{{ @$OrderAddress->address_line1 }}</textarea>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>City</label> 
                    <textarea class="form-control" name="city" maxlength="50">{{ @$OrderAddress->city }}</textarea>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>State</label> 
                    <textarea class="form-control" name="state" maxlength="50">{{ @$OrderAddress->state }}</textarea>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Pincode</label> 
                    <textarea class="form-control" name="pincode" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>{{ @$OrderAddress->pin_code }}</textarea>
                  </div>
                  <div class="form-group col-lg-12">
                    <input type="submit" class="btn btn-warning pull-right" value="PLACE ORDER">
                  </div>
                   
                </div>
              </div> 
            </div>
        </form>
            <div class="col-lg-4">
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">PRICE DETAILS</h3>
              </div>
              <div class="card-body row">
                <div class="col-lg-6 form-group">
                  Price(Item)  
                </div>
                <div class="col-lg-6 form-group">
                    ₹{{ $amount }}
                </div>
                <div class="col-lg-6 form-group">
                  Delivery Charges
                </div>
                <div class="col-lg-6 form-group">
                    ₹100
                </div>
                <div class="col-lg-6 form-group">
                  Total Payable
                </div>
                <div class="col-lg-6 form-group">
                    ₹{{ $amount }}
                </div>
                </div>
              </div>
                
            </div>
             
         </div> 
        </div> 
    </div>
</div> 
</section>
@endsection 

