<div class="row"> 
<div class="col-lg-12 table-responsive"> 
    <table class="table" id="village_ward_sample_table" width = "100%">
        <thead>
          <tr>
            <?php
              $countr = 0;
              while ($countr < $tcols ){
                ?>
                <th width = "<?php echo e($qcols[$countr][1]); ?>%"><?php echo e($qcols[$countr][0]); ?></th>
                <?php
                $countr = $countr+1;
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $villagewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villageward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php $__currentLoopData = $villageward; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td><?php echo e($value); ?></td>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      
    </table>
</div>
</div> 