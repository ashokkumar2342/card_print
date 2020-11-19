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
                {{-- <form action="{{ route('admin.wallet.payment.option.store') }}" method="post" class="add_form">
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
                        <label>Account No.</label>
                        <input type="text" name="account_no" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Ifsc Code</label>
                        <input type="text" name="ifsc_code" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="form-control"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Branch Name</label>
                        <input type="text" name="branch_name" class="form-control">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>QR Code</label>
                        <input type="file" name="qr_code" class="form-control"> 
                    </div>
                    <div class="col-lg-12 form-group"> 
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div> 
                </form> --}} 
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
 
</script> 
@endpush

