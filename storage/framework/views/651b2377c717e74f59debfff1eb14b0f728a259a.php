<div class="row"> 
<div class="col-lg-12" style="margin-top:10px;">
   <?php
       $admin=App\Admin::find($id);
     ?>  
        User Name : <span style="color:#d02ee7 ;margin-bottom: 10px"><b><?php echo e(isset($admin->email) ? $admin->email : ''); ?>-( <?php echo e(isset($admin->first_name) ? $admin->first_name : ''); ?> )</b></span> 
  <table class="table table-condensed "id="user_menu_table" style="width: 100%"> 
    <thead> 
      <tr>
        <th>Sub Menu Name</th>
        <th>Main Menu Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td></td>
        <td><?php echo e($menu->name); ?></td>
        <td></td>
      </tr>
      <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($menu->id==$subMenu->menu_type_id ): ?>
      <tr style="<?php echo e(in_array($subMenu->id, $usersmenus)?'background-color: #28a745':'background-color: #dc3545'); ?>">
        <td><?php echo e($subMenu->name); ?></td>
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