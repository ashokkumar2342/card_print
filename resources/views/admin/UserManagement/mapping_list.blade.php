<table class="table table-bordered">
	<thead>
		<tr>
			<th>District</th>
			<th>Distributer</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($districts as $district)
		<tr>
			<td>{{ $district->Name_E }}</td>
			<td>{{ $district->Distributer->user_name or ''}}-{{ $district->Distributer->email or ''}}-{{ $district->Distributer->mobile or ''}}</td>
		</tr> 
		@endforeach
	</tbody>
</table>