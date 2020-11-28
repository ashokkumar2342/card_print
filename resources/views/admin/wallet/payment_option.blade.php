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
                <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>Payment Mode</th>
                             <th>Account No.</th>
                             <th>Ifsc Code</th>
                             <th>Account Name</th> 
                             <th>Action</th> 
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($paymentOptions as $paymentOption) 
                         <tr>
                             <td>{{ $paymentOption->paymentMode->name or '' }}</td>
                             <td>{{ $paymentOption->account_no }}</td>
                             <td>{{ $paymentOption->ifsc_code }}</td>
                             <td>{{ $paymentOption->account_name }}</td>
                             <td>
                                 <a href="" title="" class="btn btn-xs btn-primary">Active</a>
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

