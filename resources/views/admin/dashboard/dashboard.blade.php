@extends('admin.layout.base')
@section('body')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a id="district_update_btn" onclick="callPopupLarge(this,'{{ route('admin.district.update') }}')" hidden="hidden">Dis</a></li>
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          {{-- <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>000</h3>

                <p>000</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
          {{-- <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>000</h3>

                <p>000</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
          @foreach ($values as $value) 
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $value->value1 }}</h3>

                <p>{{ $value->text1 }}</p>
              </div>
              <div class="icon">
                @if ($user->id==1)
                  <i class="fa fa-users text-success"></i>
                  @else
                  <i class="fa fa-inr text-success"></i> 
                @endif 
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $value->value2 }}</h3>

                <p>{{ $value->text2 }}</p>
              </div>
              <div class="icon">
                <i class="fa fa-file  text-primary"></i>
              </div>
              
            </div>
          </div>
          @endforeach
          </div>
        </div>
        @if ($user->role_id!=1) 
        <div class="card">
          <div class="card-header bg-success">
            <h3 class="card-title">Recharge Package <small>Offer</small></h3>
          </div> 
              <table class="table">
                <thead>
                  <tr>
                    <th style="border-bottom: 2px solid #e92259;">Package Name</th>
                    <th style="border-bottom: 2px solid #e92259;">Package Price</th>
                    <th style="border-bottom: 2px solid #e92259;">Package Value</th>
                    <th style="border-bottom: 2px solid #e92259;">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($recharge_packages as $recharge_package)
                  <tr>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_name }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_price }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_value }}</td>
                    <td style="border-bottom: 2px solid #e92259;">
                      <a href="{{ route('admin.wallet.recharge.wallet') }}" class="btn btn-xs btn-success">Recharge Now</a>
                    </td>
                    
                  </tr> 
                  @endforeach
                </tbody>
              </table> 
            </div>
           
        @endif 
    </section>
@endsection
@push('scripts')
<script>
  @if ($user->district_id==0 && $user->id>2)
    $('#district_update_btn').click(); 
  @endif
</script>
@endpush 

