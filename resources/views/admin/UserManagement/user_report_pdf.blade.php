
				<tr>
					<td style="padding-left: {{ $margin }}px;background-color: {{ $bgcolor }};" class="bg-success">{{ $users->user_name }}</td>
					<td>{{ $users->email }} - {{ $users->mobile }}</td>
					@php
					 	if ($users->status==0) {
					 		$status='Pending'; 
					 	}
					 	elseif ($users->status==1) {
					 		$status='Active'; 
					 	}
					 	elseif ($users->status==2) {
					 		$status='InActive'; 
					 	}
					@endphp
					<td>{{ $status }}</td>
					<td>{{ $users->amt }}</td>
					<td>{{ $users->tcardprint or ''}}</td>
				</tr> 
		