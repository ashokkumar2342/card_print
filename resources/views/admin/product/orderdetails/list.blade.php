@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Order Details</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th> 
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($OrderDetails as $OrderDetail) 
                        <tr>
                             
                            <td>{{ $OrderDetail->Items->item_name_e or ''}}</td>
                            <td>{{ $OrderDetail->Items->net_price or '' }}</td>
                            <td>{{ $OrderDetail->qty }}</td>
                            <td>{{ $OrderDetail->amt*$OrderDetail->qty }}</td> 
                            <td>{{ $OrderDetail->remarks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
              
            </div> 
        </div>
    </div> 
    </section>
    @endsection 

