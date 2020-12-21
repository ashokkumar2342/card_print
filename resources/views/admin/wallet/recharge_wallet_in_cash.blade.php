@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Recharge Wallet In Cash</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.wallet.recharge.wallet.in.cash.store') }}" method="post" class="add_form">
                    <div class="row"> 
                        <div class="col-lg-6 form-group">
                            <label>Users</label>
                            <select name="user_id" class="form-control">
                                <option selected disabled>Select User</option>
                                @foreach ($users as $user)
                                 <option value="{{ $user->id }}">{{ $user->user_name }}--{{ $user->mobile }}</option> 
                                @endforeach 
                            </select> 
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Amount</label>
                            <select name="amount" class="form-control">
                            @foreach ($recharge_packages as $recharge_package)
                                <option value="{{ $recharge_package->id }}">{{ $recharge_package->package_name }}</option> 
                            @endforeach 
                        </select>
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

