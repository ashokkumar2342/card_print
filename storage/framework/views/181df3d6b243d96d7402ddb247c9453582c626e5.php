<div class="row"> 
<div class="col-lg-12 table-responsive"> 
    <table class="table table-striped" id="assembly_sample_table">
       <thead>
           <tr>
               <th>district_name</th>
               <th>district_id</th>
               <th>assembly_code</th>
               <th>assembly_name_eng</th>
               <th>assembly_name_hindi</th>
               <th>total_parts</th>
           </tr>
       </thead>
       <tbody>
        <?php $__currentLoopData = $assemblys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assembly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
           <tr>
               <td><?php echo e($assembly->name_e); ?></td>
               <td><?php echo e($assembly->id); ?></td>
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