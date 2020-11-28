@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Payment Option</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.wallet.payment.option.store') }}" method="post" class="add_form">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-12 form-group">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control" onchange="callAjax(this,'{{ route('admin.wallet.payment.option.change') }}','payment_option_form')">
                            <option selected disabled>Select Payment Mode</option>
                            @foreach ($paymentModes as $paymentMode)
                             <option value="{{ $paymentMode->id }}">{{ $paymentMode->name }}</option>  
                            @endforeach
                         </select> 
                    </div>
                </div>
                <div  id="payment_option_form">
                     
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

