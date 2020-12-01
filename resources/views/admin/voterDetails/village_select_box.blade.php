<option selected disabled>Select Village</option>
@foreach ($villages as $village)
<option value="{{ $village->vilname }}">{{ $village->vilname }}</option> 
@endforeach 
 