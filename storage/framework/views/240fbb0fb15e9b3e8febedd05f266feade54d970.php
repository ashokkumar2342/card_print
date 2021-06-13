
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
  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition login-page" style="background-image: url(' <?php echo e(asset('img/bg.jpg')); ?>')">
<div class="login-box">
  <div class="login-logo">
   
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="background-color: #a4bcff">
      <p class="login-box-msg"></p>

      <form action="<?php echo e(route('admin.login')); ?>" method="post" class="add_form">
        <?php echo e(csrf_field()); ?>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-danger"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-success"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
        <div class="captcha">
         <span><?php echo captcha_img('flat'); ?></span>
         <button type="button" class="btn btn-warning" onclick="refresh()"><i class="fas fa-1x fa-sync-alt" ></i></button>
       </div>
       <div class="input-group mb-3" style="margin-top: 15px">
          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"> 
          <div class="input-group-append">
            <div class="input-group-text">
               
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('captcha')); ?></p> 
        <div class="row"> 
          
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
<script src="<?php echo e(asset('admin_asset/plugins/jQuery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>


<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin_asset/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/dist/js/toastr.min.js')); ?>"></script>
<?php echo $__env->make('admin.include.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
  function refresh(){
    $.ajax({
     type:'GET',
     url:'<?php echo e(route('admin.refresh.captcha')); ?>',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
  }
 
</script> 
<script data-ad-client="ca-pub-6986129570235357" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</body>
</html>
