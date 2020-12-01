<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b> Voter Card Print</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo e(route('admin.register.store')); ?>" method="post" class="add_form">
        <?php echo e(csrf_field()); ?>

        <div class="input-group mb-3">
          <input type="text" name="user_name" class="form-control" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('user_name')); ?></p>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> 
        </div>
        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
        <div class="input-group mb-3">
          <input type="text" name="mobile" class="form-control" placeholder="Mobile No." maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('mobile')); ?></p>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo e($errors->first('confirm_password')); ?></p>
        <div class="row"> 
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div> 
        </div>
      </form> 
      <a href="<?php echo e(route('admin.login')); ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo e(asset('admin_asset/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin_asset/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/dist/js/toastr.min.js')); ?>"></script>
<?php echo $__env->make('admin.include.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
