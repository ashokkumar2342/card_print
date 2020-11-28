<div class="card card-primary table-responsive"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                         <th class="text-nowrap">States</th>
                                         <th class="text-nowrap">District</th>
                                         <th class="text-nowrap">Block MCS</th>
                                         <th class="text-nowrap">Code</th>
                                         <th class="text-nowrap">Name (Eng.)</th>
                                         <th class="text-nowrap">Name (Local Lang.)</th>
                                         <th class="text-nowrap">(Total Ward)</th>
                                         <th class="text-nowrap">Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $Villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $WardVillage=App\Model\WardVillage::where('village_id',$Village->id)->count('ward_no'); 
                                    ?>
                                     <tr>
                                         <td><?php echo e(isset($Village->states->name_e) ? $Village->states->name_e : ''); ?></td>
                                         <td><?php echo e(isset($Village->district->name_e) ? $Village->district->name_e : ''); ?></td>
                                         <td><?php echo e(isset($Village->blockMCS->name_e) ? $Village->blockMCS->name_e : ''); ?></td>
                                         <td><?php echo e($Village->code); ?></td>
                                         <td><?php echo e($Village->name_e); ?></td>
                                         <td><?php echo e($Village->name_l); ?></td>
                                         <td><?php echo e($WardVillage); ?></td>
                                         <td class="text-nowrap">
                                            <button type="button" class="btn btn-primary btn-xs" onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.village.ward.add',$Village->id)); ?>')">Add Ward</button>
                                             <a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.village.edit',$Village->id)); ?>')" title="Edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                             <a href="#" success-popup="true" select-triger="block_select_box" onclick="callAjax(this,'<?php echo e(route('admin.Master.village.delete',$Village->id)); ?>')" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                         </td>
                                     </tr> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                             </table>
                        </div> 