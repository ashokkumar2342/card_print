<div class="row"> 
<div class="col-lg-12" style="margin-top:10px;">
   <?php
       $user=App\Model\User::find($user_id);
     ?>  
        User Name : <span style="color:#d02ee7 ;margin-bottom: 10px"><b><?php echo e(isset($user->email) ? $user->email : ''); ?> -- <?php echo e(isset($user->user_name) ? $user->user_name : ''); ?></b></span> 
  <table class="table table-bordered table-striped"id="user_menu_table" style="width: 100%"> 
    <thead> 
      <tr>
        <th>Sub Menu Name</th>
        <th>Main Menu Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $mainMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td></td>
        <td><?php echo e($mainMenu->menu_name); ?></td>
        <td></td>
      </tr>
      <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($mainMenu->id==$subMenu->main_menu_id ): ?>
      <tr style="<?php echo e(in_array($subMenu->id, $usersmenus)?'background-color: #28a745':'background-color: #dc3545'); ?>">
        <td><?php echo e($subMenu->sub_menu_name); ?></td>
        <td></td>
            
         <td><?php if( in_array($subMenu->id, $usersmenus)): ?> Yes <?php else: ?>  No <?php endif; ?>  </td> 
    
      </tr>
       <?php endif; ?> 
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
  </table>
</div>
</div>