<div class="col-lg-12"> 
<div class="card card-info">
  <div class="card-header">
     <h3 class="card-title"></h3>
    </div> 
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped" id="voter_list_table">
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Name </th>
            <th>F/H Name</th>
            <th>Village</th>
            <th>Ward</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $voterLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($voterList->sr_no); ?></td>
              <td><?php echo e($voterList->name_l); ?></td>
              <td><?php echo e($voterList->father_name_l); ?></td>
              <td><?php echo e($voterList->vil_name); ?></td>
              <td><?php echo e($voterList->ward_no); ?></td>
            </tr> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
        
    </div>
  </div>
</div>