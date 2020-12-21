@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Recharge Wallet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.wallet.cashbook.store') }}" method="post" class="add_form">
                {{ csrf_field() }}
                <div class="row">
                <div class="col-lg-3 form-group">
                    <label>Amount</label>
                    <select name="amount" class="form-control">
                        @foreach ($recharge_packages as $recharge_package)
                            <option value="{{ $recharge_package->id }}">{{ $recharge_package->package_name }}</option> 
                        @endforeach 
                    </select>
                </div> 
                    <div class="col-lg-3 form-group">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control" onchange="callAjax(this,'{{ route('admin.wallet.payment.option.show') }}','payment_option_show')">
                            <option selected disabled>Select Payment Mode</option>
                            @foreach ($paymentModes as $paymentMode)
                             <option value="{{ $paymentMode->id }}">{{ $paymentMode->name }}</option>  
                            @endforeach
                         </select> 
                    </div> 
                    <div class="col-lg-3 form-group">
                        <label>Transaction Date</label>
                        <input type="date" name="transaction_date" class="form-control"> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Transaction No</label>
                        <input type="text" name="transaction_no" class="form-control"> 
                    </div> 
                    <div class="col-lg-12 form-group"> 
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div> 
                </form> 
             </div>
             <div id="payment_option_show">
                 
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
 
</script> 
@endpush

