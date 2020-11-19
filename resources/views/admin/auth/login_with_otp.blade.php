@extends('admin.layout.auth')
@section('body')
<body class="register-page" style="min-height: 584.091px;">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Voter Card Print</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('admin.send.otp') }}" method="post">
      {{ csrf_field() }} 
        <div class="input-group mb-3">
          <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Mobile No." onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> 
        <div class="row"> 
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

       

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


</body>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 
<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'{{ route('admin.refresh.captcha') }}',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
});
</script>
  @endpush