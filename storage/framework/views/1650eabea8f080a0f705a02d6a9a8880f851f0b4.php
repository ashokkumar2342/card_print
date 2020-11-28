 
  <?php
   $hotMenus =App\Helper\MyFuncs::hotMenu(); 
  ?>
  <?php $__currentLoopData = $hotMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <li class="nav-item d-none d-sm-inline-block">
       <a class="nav-link" href="<?php echo e(route(''.$hotMenu->url)); ?>"><?php echo e($hotMenu->name); ?> </a>
      </li> 
   
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 
 

