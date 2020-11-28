<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile No.</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($user->user_name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->mobile); ?></td>
        <td>
            <a style="color:#fff" onclick="callPopupLarge(this,'<?php echo e(route('admin.user.approval.form',$user->id)); ?>')" title="" class="btn btn-xs btn-primary">Approval</a>
        </td>
    </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>