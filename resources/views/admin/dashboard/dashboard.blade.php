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
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> --}}
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
          <div class="col-lg-6 col-6"> 
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $value->value2 }}</h3>

                <p>{{ $value->text2 }}</p>
                <div class="icon">
                  <i class="fa fa-file  text-primary"></i>
                </div>
              </div> 
            </div>
          </div>
          @endforeach
          
          
          </div>
        </div>

        <!-- Dashboard only for Admin Work Report-->
        @if ($user->role_id==1) 
        <div class="card">
          <div class="card-header bg-gray">
            <h3 class="card-title">Districtwise Progress</h3>
          </div>
          <div class="table-responsive"> 
              <table class="table">
                <thead class="bg-gray">
                  <tr>
                    <th style="border-bottom: 2px solid #e92259;">District</th>
                    <th style="border-bottom: 2px solid #e92259;">Total User</th>
                    <th style="border-bottom: 2px solid #e92259;">New User</th>
                    <th style="border-bottom: 2px solid #e92259;">Active User</th>
                    <th style="border-bottom: 2px solid #e92259;">Card Printed</th>
                    <th style="border-bottom: 2px solid #e92259;">Recharge Value</th>
                    <th style="border-bottom: 2px solid #e92259;">Recharge Count</th>
                    <th style="border-bottom: 2px solid #e92259;">AADHAR Card</th>
                    <th style="border-bottom: 2px solid #e92259;">PAN Card</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[0]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[1]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[2]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[3]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[4]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[5]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[6]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[7]}}</b></td>
                    <td style="border-bottom: 2px solid #e92259;"><b>{{$totals[8]}}</b></td>
                    
                  </tr>
                  @foreach ($work_details as $work_detail)
                  <tr>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->Name_E }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->total_user }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->new_user }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->active_user }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->print_card }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->recharge }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->t_req_recharge }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->t_aadhar_card }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $work_detail->t_pan_card }}</td>
                    
                    
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div> 
            </div>
           
        @endif



        @if ($user->role_id!=1) 
        <div class="card">
          <div class="card-header bg-gray">
            <h3 class="card-title">Recharge Package <small>Offer</small></h3>
          </div> 
              <table class="table">
                <thead class="bg-gray">
                  <tr>
                    <th style="border-bottom: 2px solid #e92259;">Package Name</th>
                    <th style="border-bottom: 2px solid #e92259;">Package Price</th>
                    <th style="border-bottom: 2px solid #e92259;">Package Value</th>
                    <th style="border-bottom: 2px solid #e92259;">Description</th>
                    <th style="border-bottom: 2px solid #e92259;">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($recharge_packages as $recharge_package)
                  <tr>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_name }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_price }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->package_value }}</td>
                    <td style="border-bottom: 2px solid #e92259;">{{ $recharge_package->remarks }}</td>
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

