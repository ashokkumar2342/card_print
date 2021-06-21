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
                <h3>Family ID Card Print</h3>
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
                  <li>Family ID कार्ड PDF का शुल्क 10 रु० (प्रति Family ID कार्ड) है.</li>
                </ul>
              </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.card.print.familyid.store') }}" method="post" enctype="multipart/form-data" class="add_form" content-refresh="Familyid_table">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="exampleInputFile">Family ID Card</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="family_card" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                </div> 
                              </div>
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
                    <table class="table"  id="Familyid_table">
                        <thead>
                            <th>Family ID No.</th> 
                            <th>Name</th> 
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($FamilyDetails as $FamilyDetail)
                            <tr>
                                <td>{{$FamilyDetail->family_id}}</td>
                                <td>{{$FamilyDetail->head_name}}</td>
                                <input type="hidden" id="r_id{{$FamilyDetail->id}}" value="{{$FamilyDetail->id}}">
                                <td>
                                    <a id="download_btn{{$FamilyDetail->id}}" onclick="Familydownloaded('{{$FamilyDetail->id}}')" class="btn btn-xs btn-success" target="blank" ><i class="fa fa-download"></i></a>
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
$('#Familyid_table').DataTable();
$(function () {
  bsCustomFileInput.init();
});
@php
    // $url =route('admin.card.print.adhaar.download',$PanDetail->id);
@endphp
function Familydownloaded(r_id) {  
      
     $('#download_btn'+r_id).attr("href",'{{route('admin.card.print.familycard.download','')}}'+'&id='+$('#r_id'+r_id).val());
    
}
   
 
</script>
@endpush

