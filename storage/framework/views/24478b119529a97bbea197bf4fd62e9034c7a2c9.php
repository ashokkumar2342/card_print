<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Block MSC Type Update</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="card card-primary table-responsive"> 
                             <table id="gender_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr> 
                                         <th>Block MSC Type (English)</th>
                                         <th>Block MSC Type (Local Language)</th> 
                                         <th>Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $BlockMCTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BlockMCType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>                                     
                                         
                                         <td><?php echo e($BlockMCType->block_mc_type_e); ?></td>
                                         <td><?php echo e($BlockMCType->block_mc_type_l); ?></td> 
                                         <td>
                                             <button type="button" class="btn-info btn-xs btn" onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.BlockMCSTypeEdit',$BlockMCType->id)); ?>')">Edit</button>
                                         </td>                                   
                                     </tr> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                             </table>
                        </div> 
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
    <?php $__env->stopSection(); ?>
     

<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>