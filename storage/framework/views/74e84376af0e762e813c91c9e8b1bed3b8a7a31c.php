<div class="row"> 
  <div class="col-lg-3"> 
    <?php echo e(Form::label('sub_menu','Menu',['class'=>' control-label'])); ?> <br>
    <select class="selectpicker multiselect" multiple data-live-search="true" name="sub_menu[]">
      <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
      <optgroup label="<?php echo e($menu->name); ?>"> 
        <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($menu->id==$subMenu->menu_type_id ): ?>
        <option value="<?php echo e($subMenu->id); ?>" <?php echo e(in_array($subMenu->id, $datas)?'selected':''); ?> ><?php echo e($subMenu->name); ?></option> 
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </optgroup>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
    </select> 
  </div>
  <div class="col-md-3" style="margin-top: 30px"> 
    <button type="submit"  class="btn btn-success form-control">Save</button> 
  </div>
</form>
<div class="col-lg-6" style="margin-top: 30px">
   <form action="<?php echo e(route('admin.account.default.user.role.report.generate',Crypt::encrypt($id))); ?>" method="post" target="blank">
  <?php echo e(csrf_field()); ?> 
    <div class="icheck-primary d-inline">
      <input type="radio" id="radioPrimary1" name="optradio" value="selected" checked>
      <label for="radioPrimary1">Only Selected</label>  
    </div> 
    <div class="icheck-primary d-inline">
      <input type="radio" id="radioPrimary2" name="optradio" value="all" checked>
      <label for="radioPrimary2">All</label>  
    </div>
    <input type="submit" value="PDF" class="btn btn-primary" style="width: 200px;margin-left: 10px">
 </form>
  </div>
 </div>

<?php echo $__env->make('admin.account.report.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

