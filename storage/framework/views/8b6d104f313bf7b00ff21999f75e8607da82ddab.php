<div class="row"> 
    <div class="col-md-4">
        <label for="exampleInputEmail1">Menu</label></br>
        <select class="selectpicker multiselect" multiple data-live-search="true" name="sub_menu[]">
            <?php $__currentLoopData = $mainMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <optgroup label="<?php echo e($mainMenu->menu_name); ?>"> 
                <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($mainMenu->id==$subMenu->main_menu_id ): ?>
                <option value="<?php echo e($subMenu->id); ?>" <?php echo e(in_array($subMenu->id, $usersmenus)?'selected':''); ?> ><?php echo e($subMenu->sub_menu_name); ?></option> 
                <?php endif; ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
        </select> 
    </div>
    <div class="col-md-4" style="margin-top: 30px"> 
        <button type="submit"  class="btn btn-primary form-control">Save</button>  
    </div>  
    <div class="col-md-4" style="margin-top: 30px"> 
        <a href="" class="btn btn-warning form-control" target="blank" title="">Report</a> 
    </div>
</div> 
<?php echo $__env->make('admin.UserManagement.permission_table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 



