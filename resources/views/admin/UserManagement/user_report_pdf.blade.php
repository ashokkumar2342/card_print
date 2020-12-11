<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, th, td {
  			border: 1px solid black;
  			/*border-collapse:collapse;*/
		}
	</style>
</head>
<body>
	<table class="table table-bodred" width="100%">
		<thead>
			<tr>
				<th>User Name</th>
				<th>Email</th>
				<th>Mobile No.</th>
				<th>Role</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->user_name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->mobile }}</td>
					<td>{{ $user->r_name or ''}}</td>
					@php
					 	if ($user->status==0) {
					 		$status='Pending'; 
					 	}
					 	elseif ($user->status==1) {
					 		$status='Active'; 
					 	}
					 	elseif ($user->status==2) {
					 		$status='InActive'; 
					 	}
					@endphp
					<td>{{ $status }}</td>
				</tr> 
			@endforeach
		</tbody>
	</table>
</body>
</html>