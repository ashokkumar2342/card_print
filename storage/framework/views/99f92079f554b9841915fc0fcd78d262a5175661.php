
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Voter Card Print | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome --> 
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/dist/css/AdminLTE.min.css')); ?>"> 
  <!-- Google Font: Source Sans Pro -->
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b style="color: red;font-size: 30px">Voter Card Print</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo e(route('admin.login')); ?>" method="post" class="add_form">
        <?php echo e(csrf_field()); ?>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="captcha">
         <span><?php echo captcha_img('math'); ?></span>
         <button type="button" class="btn btn-success" id="refresh"><i class="fas fa-1x fa-sync-alt" ></i></button>
       </div>
       <div class="input-group mb-3" style="margin-top: 5px">
          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"> 
          <div class="input-group-append">
            <div class="input-group-text">
               
            </div>
          </div>
        </div> 
        <div class="row"> 
          <div class="col-12 form-group">
            <a href="<?php echo e(route('admin.loginWithOTP')); ?>" title="">Login With OTP</a>
          </div>
          <div class="col-12 form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form> 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery --> 
<script src="<?php echo e(asset('admin_asset/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin_asset/dist/js/adminlte.min.js')); ?>"></script>

</body>
</html>
<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'<?php echo e(route('admin.refresh.captcha')); ?>',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
});
</script>
