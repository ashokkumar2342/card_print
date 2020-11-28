<div class="row"> 
<div class="col-lg-12 table-responsive"> 
    <table class="table table-striped" id="district_sample_table">
        <thead>
            <tr>
                <th>state_name</th>
                <th>state_id</th>
                <th>district_code</th>
                <th>district_name_eng</th>
                <th>district_name_hindi</th>
                <th>total_zp_wards</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td><?php echo e($District->name_e); ?></td>
                <td><?php echo e($District->id); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div> 