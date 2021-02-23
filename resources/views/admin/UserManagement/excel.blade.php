@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">    
@endpush
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Users Report Excel</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.user.report.excel.download') }}" method="post" target="blank" success-content-id="user_report_excel" class="add_form" data-table-without-pagination="user_report_excel_datatable" no-reset="true">
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
                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary form-control" onclick="$('#report_type').val(2)">Download Excel</button>    
                </div> 
            </div> 
        </form>
        <div id="user_report_excel">
               
        </div>   
        </div> 
        </div>
    </div> 
</section>
@endsection
@push('scripts') 
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js">
@endpush


