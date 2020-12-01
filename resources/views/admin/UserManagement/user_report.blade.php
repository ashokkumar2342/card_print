@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Users Report</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.user.report.generate') }}" method="post" target="blank" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <select class="form-control" name="role_id">
                                <option value="0">All</option>
                                @foreach ($userRoles as $userRole)
                                <option value="{{$userRole->id}}">{{$userRole->r_name}}</option> 
                                 @endforeach 
                            </select>
                        </div>                                
                    </div> 
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Report Generate</button>
                </div> 
              </form>  <!-- /.card-body -->
            </div> 
        </div><!-- /.container-fluid -->
    </section>
    @endsection 
