<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 20px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 20px;
  background: red;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 20px;
  background: #4CAF50;
  cursor: pointer;
}

 /*slider2 start*/
.slider2 {
  -webkit-appearance: none;
  width: 100%;
  height: 20px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider2:hover {
  opacity: 1;
}

.slider2::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 20px;
  background: red;
  cursor: pointer;
}

.slider2::-moz-range-thumb {
  width: 25px;
  height: 20px;
  background: #4CAF50;
  cursor: pointer;
}
</style>
<div class="modal-content">
    <div class="modal-header bg-warning">
        <h4 class="modal-title">Customize Image</h4>
        <button type="button" class="close" id="btn_close"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body"> 
                @php
                $original_p='app'.$get_files_paths[0]->original_p; 
                $profile = route('admin.card.customize.original_p',Crypt::encrypt($original_p));
                $result_p='app'.$get_files_paths[0]->result_p;
                $profile2 = route('admin.card.customize.result_p',Crypt::encrypt($result_p)); 
                @endphp
        <div class="row">
            <div class="col-lg-3 form-group">
                <img  src="{{  $profile  }}" width="70%">
            </div>
            <input type="hidden" name="card_id" id="card_id" value="{{ $card_id }}">
            <input type="hidden" name="card_type" id="card_type" value="{{ $card_type }}">
            <div class="col-lg-3 form-group">
                <div class="slidecontainer">
                    <label>Brightness</label>
                    <input type="range" min="-100" max="100" value="0" class="slider bg-gray" id="myRange">
                    <p>Value: <span id="demo">0</span></p> 
                </div>
            </div>
            <div class="col-lg-3 form-group" style="margin-top: 4px">
                <div class="slidecontainer">
                    <label>Contrast</label>
                    <input type="range" min="-100" max="100" value="0" class="slider2 bg-gray" id="myRange_2">
                    <p>Value: <span id="demo_2">0</span></p>
                </div>
            </div>
            <div class="col-lg-3 form-group text-right">
                <a id="btn_refresh_image" onclick="callAjax(this,'{{ route('admin.card.customize.refresh.image',[$card_id,$card_type]) }}','refresh_image')"></a> 
                <div id="refresh_image"> 
                </div>
            </div>
            <div class="col-lg-12 text-center form-group"> 
            <a button-click="btn_refresh_image" onclick="callAjax(this,'{{ route('admin.card.customize.action_process_photo',[Crypt::encrypt($original_p),Crypt::encrypt($result_p)]) }}'+'?brightness='+$('#myRange').val()+'&contras='+$('#myRange_2').val())" title="" class="btn btn-xs btn-info" style="width: 120px;color: #fff">Preview</a>
            </div> 
            <div class="col-lg-12 text-center form-group"> 
            <a button-click="btn_close" success-popup="true" onclick="callAjax(this,'{{ route('admin.card.customize.action_apply_process_photo',[Crypt::encrypt($original_p),Crypt::encrypt($result_p)]) }}'+'?brightness='+$('#myRange').val()+'&contras='+$('#myRange_2').val()+'&card_id='+$('#card_id').val()+'&card_type='+$('#card_type').val())" title="" class="btn btn-xs btn-primary" style="width: 120px;color: #fff">Apply</a>
            <a href="" class="btn  btn-xs btn-danger" data-dismiss="modal" style="width: 120px;color: #fff">Cancel</a>
            </div> 
            
        </div> 
    </div> 
</div> 
<script> 
var slider = document.getElementById("myRange");
var slider2 = document.getElementById("myRange_2");
var output = document.getElementById("demo");
var output2 = document.getElementById("demo_2");
output.innerHTML = slider.value; 
output2.innerHTML = slider2.value; 
slider.oninput = function() {
  output.innerHTML = this.value;
}
slider2.oninput = function() {
  output2.innerHTML = this.value;
}
 $('#btn_refresh_image').click();
</script>