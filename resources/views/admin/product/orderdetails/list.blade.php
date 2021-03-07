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
                            <th>Order No.</th>
                            <th>Order Date Time</th>
                            <th>Amount</th>
                            <th>Shipment Charges</th>
                            <th>Expected Delivery Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($OrderLists as $OrderList) 
                        <tr>
                            <td>1</td>
                            <td>{{ date('d-m-Y h:i:s',strtotime($OrderList->order_date_time)) }}</td>
                            <td>{{ $OrderList->amt }}</td>
                            <td>{{ $OrderList->shipment_charges }}</td>
                            <td>{{ $OrderList->expected_delivery_date }}</td>
                            <td>{{ $OrderList->status }}</td>
                            <td>{{ $OrderList->remarks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
              
            </div> 
        </div>
    </div> 
    </section>
    @endsection 

