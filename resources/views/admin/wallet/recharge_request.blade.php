@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Recharge Request Approval</h3>
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
                            <th>Payment Mode</th>
                            <th>Transaction Date</th>
                            <th>Amount</th>
                            <th>Transaction No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashbooks as $cashbook)
                        <tr>
                            <td>{{ $cashbook->paymentMode->name or '' }}</td>
                            <td>{{ date('d-m-Y',strtotime($cashbook->transaction_date_time)) }}</td>
                            <td>{{ $cashbook->camount }}</td>
                            <td>{{ $cashbook->transaction_no }}</td>
                            <td>
                                <a href="{{ route('admin.wallet.recharge.request.approval',$cashbook->id) }}" title="" class="btn btn-xs btn-primary">Approval</a>
                                <a href="{{ route('admin.wallet.recharge.request.reject',$cashbook->id) }}" title="" class="btn btn-xs btn-danger">Reject</a>
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
@push('scripts')
<script type="text/javascript"> 
 
</script> 
@endpush
