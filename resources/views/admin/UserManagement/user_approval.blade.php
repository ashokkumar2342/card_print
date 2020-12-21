@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Users Approval</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <button type="button" hidden id="btn_user_approval_list" onclick="callAjax(this,'{{ route('admin.user.approval.list') }}','user_approval_list')">dd</button>
               <div class="table-responsive" id="user_approval_list">
                    
                </div> 
             </div>
         </div>
     </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript"> 
 $('#btn_user_approval_list').click();
</script> 
@endpush

