<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Please Update Your District</h4>
<button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close" hidden="hidden">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('admin.district.update.post') }}" method="post" class="add_form" button-click="btn_close">
{{ csrf_field() }}
<div class="row">
  <div class="col-lg-12 form-group">
    <label>District</label>
    <span class="fa fa-asterisk"></span>
    <select name="district" class="form-control">
      <option selected disabled>Select Your District Name</option>
      @foreach ($districts as $district)
        <option value="{{$district->d_id}}">{{$district->Name_E}}</option>
      @endforeach 
    </select>
  </div>
  <div class="col-lg-12 form-group">
     <input type="submit" class="btn btn-primary form-control">
  </div>
</div>
</div>
</div>
</div>

