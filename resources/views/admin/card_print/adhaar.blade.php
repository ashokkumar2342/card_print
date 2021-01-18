@extends('admin.layout.base')
@section('body')
<style>
  
.custom {
    top: .8rem;
    width: 1.50rem;
    height: 1.50rem;
}
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Aadhaar Print</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                </ol>
            </div>
        </div>
        <div class="card">
              <div class="card-header bg-danger color-palette">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Callouts
                </h3>
              </div> 
              <div class="card-body bg-danger disabled color-palette">
                <ul>
                  <li>सामान्य आधार कार्ड PDF का शुल्क 10 रु० (प्रति आधार कार्ड) है.</li> 
                  <li>आधार कार्ड PDF पैकेज़  शुल्क 1500 रु० (एक बार) है.
                    <ul>
                      <li>प्रतिदिन पहले 10 कार्ड शुल्क 1 रु० (प्रति आधार) है.</li> 
                      <li>प्रतिदिन अगले 11 से 20 कार्ड शुल्क 2 रु० (प्रति आधार) है.</li> 
                      <li>20 से अधिक 10 रु० (प्रति आधार) है. </li> 
                    </ul>
                  </li> 
                </ul>
              </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.card.print.adhaar.store') }}" method="post" enctype="multipart/form-data" class="add_form" content-refresh="Aadhaar_table">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Aadhaar Card</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="adhaar_card" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                  </div> 
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary form-control">Upload</button>   
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <div class="card card-info">  
                <div class="col-lg-12 table-bordered table-responsive">
                    <table class="table"  id="Aadhaar_table">
                        <thead>
                            <th>Aadhaar No.</th> 
                            <th>Name</th> 
                            <th>Background</th> 
                            <th>Download Date</th>
                            <th>Tag line</th>
                            <th>Mobile No.</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($AadharDetails as $AadharDetail)
                            <tr>
                                <td>{{$AadharDetail->aadhar_no}}</td>
                                <td>{{$AadharDetail->name_e}}</td>
                                <td> 
                                    <input type="checkbox" class="form-control custom" name="background" value="0" id="background{{$AadharDetail->id}}" onclick="$(this).val(this.checked ? 1 : 0)"> 
                                </td>
                                <td>
                                    <input type="checkbox"  class="form-control custom" name="download_date" value="0" id="download_date{{$AadharDetail->id}}" onclick="$(this).val(this.checked ? 1 : 0)">
                                </td>
                                <td>
                                    <input type="checkbox"  class="form-control custom" name="tag_line" value="0" id="tag_line{{$AadharDetail->id}}" onclick="$(this).val(this.checked ? 1 : 0)">
                                </td>
                                <td>
                                    <input type="checkbox"  class="form-control custom" name="mobile_no" value="0" id="mobile_no{{$AadharDetail->id}}" onclick="$(this).val(this.checked ? 1 : 0)">
                                </td>
                                <input type="hidden" id="r_id{{$AadharDetail->id}}" value="{{$AadharDetail->id}}">
                                <td>
                                    <a id="download_btn{{$AadharDetail->id}}" onclick="downloaded('{{$AadharDetail->id}}')" class="btn btn-xs btn-success" target="blank" style="color: #fff"><i class="fa fa-download"></i></a>
                                    <a id="btn_customize_image" class="btn btn-xs btn-info" target="blank" onclick="callPopupLarge(this,'{{ route('admin.card.adhaar.crop.image',[$AadharDetail->id,1]) }}')" style="color: #fff"></i>Customize Image</a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-info btn-xs" style="float:right;margin: 5px" onclick="callPopupLarge(this,'{{ route('admin.card.adhaar.print.feedback',2) }}')">Feedback</button>
                    
                </div> 
            </div>
        </div>         
</section>
@endsection
@push('scripts')
<script>
$('#Aadhaar_table').DataTable();
$(function () {
  bsCustomFileInput.init();
});
@php
    // $url =route('admin.card.print.adhaar.download',$AadharDetail->id);
@endphp
function downloaded(r_id) {
      
    $('#download_btn'+r_id).attr("href",'{{route('admin.card.print.adhaar.download','')}}'+'&id='+$('#r_id'+r_id).val()+'&background='+$('#background'+r_id).val()+'&download_date='+$('#download_date'+r_id).val()+'&tag_line='+$('#tag_line'+r_id).val()+'&mobile_no='+$('#mobile_no'+r_id).val());
    
} 
</script>
@endpush

