<option selected disabled>Select Ac.No.</option>
@foreach ($ac_nos as $ac_no)
<option value="{{ $ac_no->AC_NO }}">{{ $ac_no->AC_NO }}--{{ $ac_no->NAME_EN }}</option> 
@endforeach