<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,th,td{
			border :1px solid black;
		}
	</style>
</head>
<body>
	<table>
	<thead>
		<tr>
			<th>User Name</th>
			<th>Transaction Date</th> 
			<th>Transaction No.</th> 
			<th>Credit Amount</th> 
			<th>Transaction Type</th> 
			<th>Remarks</th> 
			<th>Status</th> 
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
</body>
</html>