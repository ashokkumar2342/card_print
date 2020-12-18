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
            <div class="card-body">
                <table class="table table-striped table-bordered">
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
                        $color='background-color:#479641';
                        $status='Active';
                    }elseif($user->status==2){
                        $color='background-color:#a4b1bf'; 
                        $status='disabled';
                    }                    
                    @endphp
                    <tr style="{{ $color }}">
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->r_name }}</td>
                        <td>{{ $status }}</td>
                        <td>
                           <a href="{{ route('admin.user.list.status',Crypt::encrypt($user->id)) }}" class="btn btn-xs btn{{ $color }}" title="">Active</a>
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

