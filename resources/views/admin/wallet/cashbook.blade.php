@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Cashbook</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.wallet.cashbook.report') }}" method="post" class="add_form" success-content-id="report_table" no-reset="true" data-table="report-table">
                {{ csrf_field() }}
                <div class="row">  
                    <div class="col-lg-4 ">
                        <div class="form-group">
                          <label>Date Range </label>
                          <input type="text" id="reportrange" name="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"> 
                        </div> 
                    </div>
                    
                    <div class="col-lg-12 form-group"> 
                        <input type="submit" class="form-control btn btn-primary" value="Show">
                    </div>
                </div> 
                </form> 
                <div class="col-lg-12" id="report_table">
                    
                </div>
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
  
 $(function() {

     var start = moment().subtract(6, 'days');
     var end = moment();

     function cb(start, end) {
         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
     }

     $('#reportrange').daterangepicker({
         startDate: start,
         endDate: end,
         ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         }
     }, cb);

     cb(start, end);

 });
 
</script> 
@endpush

