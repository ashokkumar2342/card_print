<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Feedback Request</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center form-group" style="height: 200px">
            <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
                <h3>Your opinion matters</h3>
                <h5>Help us improve our product? <strong>Give us your feedback.</strong></h5>
                <hr>
                <h6>Your Rating</h6>
        </div>
        <form action="{{ route('admin.card.adhaar.print.feedback.store') }}" method="post" class="add_form" button-click="btn_close">
        {{csrf_field()}}
        <input type="hidden" name="type" value="{{$type}}">
        <div class="modal-body">
            <div class="form-check mb-4 form-group"> 
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary1" name="r1" onclick="$(this).val(this.checked ? 5 : 0)">
                    <label for="radioPrimary1">Excellent
                    </label>
                </div> 
            </div>
            <div class="form-check mb-4 form-group"> 
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary2" name="r1" onclick="$(this).val(this.checked ? 4 : 0)">
                    <label for="radioPrimary2">Very Good
                    </label>
                </div> 
            </div>
            <div class="form-check mb-4 form-group"> 
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary3" name="r1" onclick="$(this).val(this.checked ? 3 : 0)">
                    <label for="radioPrimary3">Good
                    </label>
                </div>
            </div>
            <div class="form-check mb-4 form-group"> 
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary4" name="r1" onclick="$(this).val(this.checked ? 2 : 0)">
                    <label for="radioPrimary4">Bad
                    </label>
                </div> 
            </div>
            <div class="form-check mb-4 form-group"> 
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary5" name="r1" onclick="$(this).val(this.checked ? 1 : 0)">
                    <label for="radioPrimary5">Very Bad
                    </label>
                </div> 
            </div> 
            <div class="text-center">
                <h4>What could we improve?</h4>
            </div> 
            <textarea type="textarea" name="message" class="form-control" placeholder="Your Message" rows="3"></textarea>  
            <div class="modal-footer"> 
                <button type="submit" class="btn btn-primary">Send <i class="fa fa-paper-plane"></i></button> 
                <a href="" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a>
            </div>
        </div>
        </form>   
        </div>
    </div>
</div>
@push('scripts')
 
@endpush

