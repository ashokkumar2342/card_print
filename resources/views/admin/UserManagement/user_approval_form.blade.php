<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Approval</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.user.approval.store') }}" method="post" class="add_form" button-click="btn_close,btn_user_approval_list">
                {{ csrf_field() }}
                <div class="row">
                <input type="hidden" name="op_id" value="{{ $op_id }}"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Charge Card</label>
                            <span class="fa fa-asterisk"></span> 
                            <div class="input-group"> 
                                <input type="text" Name="charge_card" class="form-control" maxlength="5" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Mobile No.">
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Free Card</label>
                            <span class="fa fa-asterisk"></span> 
                            <div class="input-group"> 
                                <input type="text" Name="free_card" class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Mobile No.">
                            </div> 
                        </div>
                    </div> 
                </div>   
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Approved </button>
                </div> 
            </form>  <!-- /.card-body --> 
        </div>
    </div>
</div>

