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
                    <div class="col-lg-3">
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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="status">
                                <option value="3">All</option>
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                                <option value="2">Disabled</option> 
                            </select>
                        </div>                                
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="form-group" style="margin-top: 5px">
                            <label for="exampleInputEmail1">Balance</label>
                            <div class="form-group clearfix">
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="pre_printed_card" checked="" value="1">
                                <label for="radioPrimary1">>
                                </label>
                              </div>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="pre_printed_card"value="2">
                                <label for="radioPrimary2"><
                                </label>
                              </div> 
                            </div> 
                        </div>                                
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" name="amount" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                        </div>                                
                    </div>
                    <div class="col-lg-3"> 
                        <div class="form-group" style="margin-top: 5px">
                            <label for="exampleInputEmail1">Balance</label>
                            <div class="form-group clearfix">
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="pre_printed_card" checked="" value="1">
                                <label for="radioPrimary1">>
                                </label>
                              </div>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="pre_printed_card"value="2">
                                <label for="radioPrimary2"><
                                </label>
                              </div>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="pre_printed_card"value="2">
                                <label for="radioPrimary2"><
                                </label>
                              </div> 
                            </div>
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

