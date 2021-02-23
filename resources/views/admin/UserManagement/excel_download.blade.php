 
	<table class="table table-bodred" id="user_report_excel_datatable">
		<thead>
			<tr>
				<th>User Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Balance</th>
				<th>Card Printed</th> 
			</tr>
		</thead>
		<tbody>
			@foreach ($Operators as $Operator)
			<tr>
				<td>{{ $Operator->user_name }}</td>
				<td>{{ $Operator->email }}</td>
				<td>{{ $Operator->mobile }}</td>
				<td>{{ $Operator->amt }}</td>
				<td>{{ $Operator->tcardprint }}</td> 
			</tr> 
			@endforeach 
				 
		</tbody>
	</table> 