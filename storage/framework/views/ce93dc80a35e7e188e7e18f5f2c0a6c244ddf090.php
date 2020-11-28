<div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary"> 
                            <form action="<?php echo e(route('admin.voter.details.store')); ?>" method="post" class="add_form" content-refresh="district_table" no-reset="true">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body">
                                    <div class="row">  
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.voter.districtWiseAssembly')); ?>','assembly_select_box');callAjax(this,'<?php echo e(route('admin.voter.districtWiseVillage')); ?>','village_select_box')">
                                            <option selected disabled>Select District</option>
                                            <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($District->id); ?>"><?php echo e($District->code); ?>--<?php echo e($District->name_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Assembly</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="assembly" class="form-control" id="assembly_select_box" onchange="callAjax(this,'<?php echo e(route('admin.voter.AssemblyWisePartNo')); ?>','part_no_select_box')">
                                            <option selected disabled>Select Assembly</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control" id="village_select_box" onchange="callAjax(this,'<?php echo e(route('admin.voter.VillageWiseWard')); ?>','ward_no_select_box')">
                                            <option selected disabled>Select Village</option> 
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">Part No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="part_no" class="form-control" id="part_no_select_box" >
                                            <option selected disabled>Select Part No.</option> 
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">Ward No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="ward_no" class="form-control" id="ward_no_select_box" >
                                            <option selected disabled>Select Ward No.</option> 
                                        </select>
                                    </div>
                                    
                                </div>
                            </div> 
                            <div class="card-body">
                                    <div class="row"> 
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">House No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="house_no" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Voter Name</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="voter_name" class="form-control" value="<?php echo e($voterNews->name_l); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">F/H Name</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="father_name" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Relation</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="relation" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="gender" class="form-control" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.voter.districtWiseAssembly')); ?>','assembly_select_box')">
                                            <option selected disabled>Select Gender</option>
                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($gender->id); ?>"><?php echo e($gender->genders); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Date of Birth</label>
                                        
                                        <input type="date" name="date_of_birth" class="form-control" onchange="callAjax(this,'<?php echo e(route('admin.voter.calculateAge')); ?>','age_value_div')">
                                    </div>
                                    <div class="col-lg-4 form-group" id="age_value_div">
                                        <label for="exampleInputEmail1">Age</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="age" class="form-control" >
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Voter ID No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="voter_id_no" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Mobile No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="mobile_no" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group"> 
                                        <input type="submit" class="btn btn-danger form-control" value="Delete" style="margin-top: 30px">
                                    </div>
                                </div>
                            </div> 
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary table-responsive"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                          
                                         <th>Sr.No.</th>
                                         <th>Name</th>
                                         <th>F/H Name</th>
                                         <th>Ward</th>
                                         <th>Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                   <?php $__currentLoopData = $voterDeletes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterDeletes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr href="">
                                          
                                         
                                         <td><?php echo e($voterDeletes->sr_no); ?></td>
                                         <td><?php echo e($voterDeletes->name_e); ?></td>
                                         <td><?php echo e($voterDeletes->father_name); ?></td>
                                         <td><?php echo e($voterDeletes->ward_id); ?></td>
                                         <td>
                                             <a href="" title="">Restore</a>
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