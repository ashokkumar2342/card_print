<option selected disabled>Select Part No.</option>
@foreach ($part_nos as $part_no)
<option value="{{ $part_no->Part_No }}">{{ $part_no->Part_No }}</option> 
@endforeach