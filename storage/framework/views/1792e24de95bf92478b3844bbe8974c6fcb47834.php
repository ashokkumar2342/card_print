<table id="block_datatable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>States</th>
            <th>District</th>
            <th>Code</th>
            <th>Name (English)</th>
            <th>Name (Local Language)</th>
            <th>Block MSC Type</th>
            <th>Total P.S.Ward</th>
            <th>Action</th>
             
        </tr>
    </thead>
    <tbody>
       <?php $__currentLoopData = $BlocksMcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BlockMc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php
           $psward=App\Model\WardPanchayat::where('blocks_id',$BlockMc->id)->count('ward_no'); 
       ?>
        <tr>
            <td><?php echo e(isset($BlockMc->states->name_e) ? $BlockMc->states->name_e : ''); ?></td>
            <td><?php echo e(isset($BlockMc->district->name_e) ? $BlockMc->district->name_e : ''); ?></td>
            <td><?php echo e($BlockMc->code); ?></td>
            <td><?php echo e($BlockMc->name_e); ?></td>
            <td><?php echo e($BlockMc->name_l); ?></td>
            <td><?php echo e(isset($BlockMc->BlockMcTypes->block_mc_type_e) ? $BlockMc->BlockMcTypes->block_mc_type_e : ''); ?></td>
            <td><?php echo e($psward); ?></td>
            <td class="text-nowrap">
                <a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.BlockMCSpsWard',$BlockMc->id)); ?>')" title="" class="btn btn-primary btn-xs" style="color: #fff">Add S.P.Ward</a>
                <a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.BlockMCSEdit',$BlockMc->id)); ?>')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                <a href="<?php echo e(route('admin.Master.BlockMCSDelete',Crypt::encrypt($BlockMc->id))); ?>" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
        </tr> 
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>