@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Search Voter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.voter.details.search') }}" method="post" class="add_form" success-content-id="voter_list_table" no-reset="true">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-3 form-group">
                            <label>District</label>
                            <select name="district" id="district_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.voter.details.district.wise.acno') }}'+'?district_id='+$('#district_select_box').val(),'ac_no_select_box')">
                                <option selected disabled>Select District</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->d_id }}">{{ $district->Name_E }}</option> 
                                @endforeach 
                            </select> 
                        </div>
                        <div class="col-lg-3 form-group">
                            <label>Ac.No.</label>
                            <select name="ac_no" class="form-control" id="ac_no_select_box" onchange="callAjax(this,'{{ route('admin.voter.details.acno.wise.partno') }}'+'?ac_no='+$('#ac_no_select_box').val(),'part_no_select_box')">
                                <option selected disabled>Select Ac.No.</option> 
                            </select> 
                        </div>
                        <div class="col-lg-3 form-group">
                            <label>Part No.</label>
                            <select name="part_no" class="form-control" id="part_no_select_box" onchange="callAjax(this,'{{ route('admin.voter.details.partno.wise.section') }}'+'?part_no='+$('#part_no_select_box').val(),'section_select_box')">
                                <option selected disabled>Select Part No.</option> 
                            </select> 
                        </div>
                        <div class="col-lg-3 form-group">
                            <label>Sections</label>
                            <select name="sections" class="form-control" id="section_select_box">
                                <option selected disabled>Select sections</option>
                            </select> 
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Name</label>
                            <input type="text" name="voter_name" class="form-control"> 
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>F/H Name</label>
                            <input type="text" name="father_name" class="form-control"> 
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>EPIC No.</label>
                            <input type="text" name="voter_card_no" class="form-control">
                        </div>
                        <div class="col-lg-12 form-group"> 
                            <input type="submit" class="form-control btn btn-info" value="Search">
                        </div> 
                    </div>
                </form>
                <div id="voter_list_table">
                    
                </div>
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
 
</script> 
@endpush

