<div class="row"> 
<div class="col-lg-6 form-group">
<label>Polling Booth</label>
<select name="part_no" class="form-control" id="part_no_select_box">
    <option selected disabled>Select Polling Booth.</option>
    @foreach ($part_nos as $part_no)
    <option value="{{ $part_no->Part_No }}">{{ $part_no->Part_No }}--{{ $part_no->Name_e }}</option> 
    @endforeach 
</select> 
</div>
<div class="col-lg-6 form-group">
<label>Area</label>
<select name="sections" class="form-control" id="section_select_box">
    <option selected disabled>Select Area</option>
    @foreach ($sections as $sections)
    <option value="{{ $sections->section }}">{{ $sections->s_name_e }}</option> 
    @endforeach
</select> 
</div>
</div>