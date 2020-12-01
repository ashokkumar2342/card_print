<div class="col-lg-12 table-responsive">
<div>
 	<a href="{{ route('admin.user.report.date.wise.download',[$from_date,$to_date]) }}" class="btn btn-sm btn-warning" target="blank" style="float:right;margin:10px">Download PDF</a>
 </div> 
<table class="table-striped table-bordered table" id="voterlistdatatable">
	<thead>
		<tr>
			<th class="text-nowrap">User Name</th>
			<th class="text-nowrap">Transaction Date</th> 
			<th class="text-nowrap">Transaction No.</th> 
			<th class="text-nowrap">Credit Amount</th> 
			<th class="text-nowrap">Transaction Type</th> 
			<th class="text-nowrap">Remarks</th> 
			<th class="text-nowrap">Status</th> 
		</tr>
	</thead>
	<tbody>
		@foreach ($datas as $data)
		<tr>
			<td>{{ $data->uname }}</td>
			<td>{{ date('d-m-Y',strtotime($data->transaction_date_time)) }}</td> 
			<td>{{ $data->transaction_no }}</td> 
			<td>{{ $data->camount }}</td> 
			<td>{{ $data->ttype }}</td> 
			<td>{{ $data->remarks }}</td>
			<td>{{ $data->tstatus }}</td> 
		</tr> 
		@endforeach
	</tbody>
</table>
</div>