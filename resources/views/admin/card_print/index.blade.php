@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Card Print</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.card.print.show') }}" method="post" class="add_form" success-content-id="voter_card_show">
                {{ csrf_field() }} 
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Voter Card No.(EPIC No.)</label>
                        <input type="text" maxlength="20" name="voter_card_no" class="form-control"> 
                    </div>
                    {{-- <div class="col-lg-4 form-group" style="margin-top: 40px">
                        <div class="icheck-primary d-inline">
                        <input type="checkbox" id="all_check" class="checked_all" name="pre_printed_card" value="1">
                        <label for="all_check" class="checked_all">Pre Printed Card</label>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Show"> 
                    </div> 
                </div>
                </form> 
                 <div class="col-lg-12" id="voter_card_show">
                     
                 </div> 
            </div>
        </div> 
    </div> 
</section>
@endsection
@push('scripts')
<script>

</script>
@endpush

