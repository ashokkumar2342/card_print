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
                <h3>PAN Card Print</h3>
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
                  <li>सामान्य PAN कार्ड PDF का शुल्क 10 रु० (प्रति PAN कार्ड) है.</li> 
                  <li>PAN कार्ड PDF पैकेज़  शुल्क 1500 रु० (एक बार) है.
                    <ul>
                      <li>प्रतिदिन पहले 10 कार्ड शुल्क 1 रु० (प्रति PAN) है.</li> 
                      <li>प्रतिदिन अगले 11 से 20 कार्ड शुल्क 2 रु० (प्रति PAN) है.</li> 
                      <li>20 से अधिक 10 रु० (प्रति PAN) है. </li> 
                    </ul>
                  </li> 
                </ul>
              </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.card.print.pancard.store') }}" method="post" enctype="multipart/form-data" class="add_form" content-refresh="Pan_table">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputFile">PAN Card</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="pan_card" class="custom-file-input" id="exampleInputFile">
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
                    <table class="table"  id="Pan_table">
                        <thead>
                            <th>Pan No.</th> 
                            <th>Name</th> 
                            <th>Background</th> 
                            <th>Format Style</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($PanDetails as $PanDetail)
                            <tr>
                                <td>{{$PanDetail->pan_no}}</td>
                                <td>{{$PanDetail->name_e}}</td>
                                <td> 
                                    <input type="checkbox" class="form-control custom" name="background" value="0" id="background{{$PanDetail->id}}" onclick="$(this).val(this.checked ? 1 : 0)"> 
                                </td>
                                <td class="text-nowrap"> 
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" class="formatstyle" id="formatstyle1_{{$PanDetail->id}}" name="formatstyle" checked onclick="$('#format_style').val(1)">
                                            <label for="formatstyle1_{{$PanDetail->id}}">Style 1
                                            </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                            <input type="radio" class="formatstyle" id="formatstyle2_{{$PanDetail->id}}" name="formatstyle" onclick="$('#format_style').val(2)">
                                            <label for="formatstyle2_{{$PanDetail->id}}">Style 2
                                            </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                            <input type="radio" class="formatstyle" id="formatstyle3_{{$PanDetail->id}}" name="formatstyle" onclick="$('#format_style').val(3)">
                                            <label for="formatstyle3_{{$PanDetail->id}}">
                                              Style 3
                                            </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                            <input type="radio" class="formatstyle" id="formatstyle4_{{$PanDetail->id}}" name="formatstyle" onclick="$('#format_style').val(4)">
                                            <label for="formatstyle4_{{$PanDetail->id}}">
                                              Style 4
                                            </label>
                                          </div>
                                          <input type="hidden" name="format_style" id="format_style" value="1">
                                    </div>
                                </td> 
                                <input type="hidden" id="r_id{{$PanDetail->id}}" value="{{$PanDetail->id}}">
                                <td>
                                    <a id="download_btn{{$PanDetail->id}}" onclick="Pandownloaded('{{$PanDetail->id}}')" class="btn btn-xs btn-success" target="blank" ><i class="fa fa-download"></i></a>
                                    <a id="btn_customize_image" class="btn btn-xs btn-info" target="blank" onclick="callPopupLarge(this,'{{ route('admin.card.adhaar.crop.image',[$PanDetail->id,2]) }}')" style="color: #fff"></i>Customize Image</a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-info btn-xs" style="float:right;margin: 5px" onclick="callPopupLarge(this,'{{ route('admin.card.adhaar.print.feedback',3) }}')">Feedback</button>
                    
                </div> 
            </div>
        </div>         
</section>
@endsection
@push('scripts')
<script>
$('#Pan_table').DataTable();
$(function () {
  bsCustomFileInput.init();
});
@php
    // $url =route('admin.card.print.adhaar.download',$PanDetail->id);
@endphp
function Pandownloaded(r_id) {  
      
     $('#download_btn'+r_id).attr("href",'{{route('admin.card.print.pancard.download','')}}'+'&id='+$('#r_id'+r_id).val()+'&background='+$('#background'+r_id).val()+'&format_style='+$('#format_style').val());
    
}
   
 
</script>
@endpush

