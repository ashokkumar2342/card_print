<div class="row">
    <div class="col-lg-12">
        <table class="table-striped table-bordered table">
            <thead>
                <tr>
                    
                    <th>Village</th>
                    <th>Ward</th> 
                    <th>Report Type</th>
                    <th class="text-nowrap">Download With Photo</th>
                    <th class="text-nowrap">Download Without Photo</th>
                    <th class="text-nowrap">Download Annexure-A</th>
                     
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $voterlistprocesseds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterlistprocessed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr> 
                    <td><?php echo e(isset($voterlistprocessed->Villages->name_e) ? $voterlistprocessed->Villages->name_e : ''); ?></td>
                    <td><?php echo e(isset($voterlistprocessed->WardVillages->ward_no) ? $voterlistprocessed->WardVillages->ward_no : ''); ?></td> 
                    <td><?php echo e(isset($voterlistprocessed->report_type) ? $voterlistprocessed->report_type : ''); ?></td>
                    <td>
                    <?php if($voterlistprocessed->status==1): ?>
                    <a target="_blank" href="<?php echo e(route('admin.voter.VoterListDownloadPDF',[$voterlistprocessed->id,'p'])); ?>" title="">Download</a>  
                    <?php else: ?>
                        Pending
                    <?php endif; ?>
                    </td>
                    <td>
                    <?php if($voterlistprocessed->status==1): ?>
                    <a target="_blank" href="<?php echo e(route('admin.voter.VoterListDownloadPDF',[$voterlistprocessed->id,'w'])); ?>" title="">Download</a>  
                    <?php else: ?>
                        Pending
                    <?php endif; ?>
                    </td>
                    <td>
                    <?php if($voterlistprocessed->status==1): ?>
                    <a target="_blank" href="<?php echo e(route('admin.voter.VoterListDownloadPDF',[$voterlistprocessed->id,'h'])); ?>" title="">Download</a>  
                    <?php else: ?>
                        Pending
                    <?php endif; ?>
                    </td>
                </tr>                                     
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>    