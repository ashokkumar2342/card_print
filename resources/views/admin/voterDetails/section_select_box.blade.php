<option selected disabled>Select sections</option>
@foreach ($sections as $sections)
<option value="{{ $sections->section }}">{{ $sections->s_name_e }}</option> 
@endforeach