<table id="district_datatable" class="table table-striped table-hover control-label">
    <thead>
        <tr>
            <th>States</th>
            <th>Code</th>
            <th>Name (English)</th>
            <th>Name (Local Language)</th>
            <th>Total Z.P.Ward</th>
            <th>Action</th>
             
        </tr>
    </thead>
    <tbody> 
<?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $ZilaParishad=App\Model\ZilaParishad::where('districts_id',$District->id)->count('ward_no'); 
?>
 <tr>
     <td><?php echo e(isset($District->states->name_e) ? $District->states->name_e : ''); ?></td>
     <td><?php echo e($District->code); ?></td>
     <td><?php echo e($District->name_e); ?></td>
     <td><?php echo e($District->name_l); ?></td>
     <td><?php echo e($ZilaParishad); ?></td>
     <td class="text-nowrap">
         <a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.DistrictsZpWard',$District->id)); ?>')" title="" class="btn btn-primary btn-xs" style="color: #fff">Add Z.P.Ward</a>
         <a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.districtsEdit',$District->id)); ?>')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
         <a href="<?php echo e(route('admin.Master.districtsDelete',Crypt::encrypt($District->id))); ?>" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
     </td>
 </tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>