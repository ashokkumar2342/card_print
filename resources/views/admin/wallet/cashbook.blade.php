@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Cashbook</h3>
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
                    <div class="col-lg-4 form-group">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option selected disabled>Select Payment Mode</option>
                            @foreach ($paymentModes as $paymentMode)
                             <option value="{{ $paymentMode->id }}">{{ $paymentMode->name }}</option>  
                            @endforeach
                         </select> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="transaction_date_time">Transaction (date and time):</label>
                          <input type="datetime-local" id="transaction_date_time" name="transaction_date_time" class="form-control">
                           
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Transaction No.</label>
                        <input type="text" name="transaction_no" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Payment Type</label>
                        <input type="text" name="payment_type" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>balance</label>
                        <input type="text" name="balance" class="form-control"> 
                    </div>
                    <div class="col-lg-12 form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control">
                    </div>
                    <div class="col-lg-12 form-group"> 
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div> 
                </form> 
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
 
</script> 
@endpush

