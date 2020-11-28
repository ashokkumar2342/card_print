<div class="row"> 
    <div class="col-md-4">
        <label for="exampleInputEmail1">Menu</label></br>
        <select class="selectpicker multiselect" multiple data-live-search="true" name="sub_menu[]">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <optgroup label="<?php echo e($menu->name); ?>"> 
                <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($menu->id==$subMenu->menu_type_id ): ?>
                <option value="<?php echo e($subMenu->id); ?>" <?php echo e(in_array($subMenu->id, $usersmenus)?'selected':''); ?> ><?php echo e($subMenu->name); ?></option> 
                <?php endif; ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
        </select> 
    </div>
    <div class="col-md-4" style="margin-top: 30px"> 
        <button type="submit"  class="btn btn-success form-control">Save</button>  
    </div>  
    <div class="col-md-4" style="margin-top: 30px"> 
        <a href="<?php echo e(route('admin.account.user.menu.assign.report',Crypt::encrypt($id))); ?>" class="btn btn-primary form-control" target="blank" title="">PDF</a> 
    </div>
</div> 


<?php echo $__env->make('admin.account.report.user_menu_assign_repot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 



