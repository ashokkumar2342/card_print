@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>User Permission</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.user.usersPermissionStore') }}" method="post" class="add_form form-horizontal" accept-charset="utf-8" no-reset="true" select-triger="user_select_box"> 
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label>User Name</label> 
                                <select class="form-control select2" id="user_select_box"  multiselect-form="true"  name="user"  onchange="callAjax(this,'{{route('admin.user.usersWiseMenuTable')}}'+'?user_id='+this.value,'menu_table')" > 
                                    <option value="" disabled selected>Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->mobile }} -- {{ $user->user_name }} </option> 
                                    @endforeach  
                                </select>  
                            </div> 
                        </div>
                        <div class="col-lg-12" id="menu_table">
                             
                        </div>               
                    </div>
                </form>  
            </div> 
        </div>
    </div>
</section>
@endsection 

