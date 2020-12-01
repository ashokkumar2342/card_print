<div class="col-lg-12"> 
<table class="table-striped table-bordered table" id="voterlistdatatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>F/H Name</th> 
			<th>EPIC No.</th> 
			<th>Gender</th> 
			<th>Age</th> 
			<th>Mobile</th> 
		</tr>
	</thead>
	<tbody>
		@foreach ($voters as $voter)
		<tr>
			<td>{{ $voter->name_e }}</td>
			<td>{{ $voter->f_name_e }}</td> 
			<td>{{ $voter->cardno }}</td> 
			<td>{{ $voter->gender }}</td> 
			<td>{{ $voter->age }}</td>
			@php
			 	$mobile=$voter->mobile;
			 	if (strlen($mobile) >=8) {
			 		$mobile = 'xxxxxxx'.substr($mobile, strlen($mobile)-3);	
			 	}
			@endphp 
			<td>{{ $mobile }}</td> 
		</tr> 
		@endforeach
	</tbody>
</table>
</div>