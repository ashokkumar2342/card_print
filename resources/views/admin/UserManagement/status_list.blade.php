@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Users List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered" id="user_list_table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @php
                    
                    if ($user->status==1){
                        $color='bg-success';
                        $status='Active';
                    }elseif($user->status==2){
                        $color='bg-danger'; 
                        $status='disabled';
                    }                    
                    @endphp
                    <tr class="{{ $color }}">
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->r_name }}</td>
                        <td>{{ $status }}</td>
                        <td>
                           <a href="{{ route('admin.user.list.status',Crypt::encrypt($user->id)) }}" class="btn btn-xs btn-info" title="">Change Status</a>
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
<script>
  $('#user_list_table').DataTable();  
</script>
@endpush

