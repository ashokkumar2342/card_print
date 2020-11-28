 
  <nav class="main-header navbar navbar-expand navbar-danger navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if ($__env->exists('admin.include.hot_menu_top')) echo $__env->make('admin.include.hot_menu_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
    </ul> 
    <ul class="navbar-nav ml-auto">       
      <li class="nav-item">
        <a class="btn btn-lg" title="Sign Out" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i>
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
           <?php echo e(csrf_field()); ?>

        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
