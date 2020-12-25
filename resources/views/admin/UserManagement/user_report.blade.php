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
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="status">
                                <option value="0">All</option>
                                <option value="1">Active</option>
                                <option value="2">Disabled</option> 
                            </select>
                        </div>                                
                    </div>
                    <div class="col-lg-6">  
                    <div class="card">
                        <div class="card-header bg-gray">
                         <h3 class="card-title">Wallet Balance</h3>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Balance</label>
                                    <select class="form-control" name="cond_bal_amount">
                                        <option value="0">All</option>
                                        <option value="1">Balance More Than</option>
                                        <option value="2">Balance Less Than</option>
                                        
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" name="amount" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                </div>                                
                            </div> 
                        </div>  
                    </div>
                </div>
                <div class="col-lg-6">  
                    <div class="card">
                        <div class="card-header bg-gray">
                         <h3 class="card-title">Card Print</h3>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Card Print</label>
                                    <select class="form-control" name="cond_card_print">
                                        <option value="0">All</option>
                                        <option value="1">Print More Than</option>
                                        <option value="2">Print Less Than</option>
                                        
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Card</label>
                                    <input type="text" name="card" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                </div>                                
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
        </div>
    </div>
    </section>
    @endsection 

