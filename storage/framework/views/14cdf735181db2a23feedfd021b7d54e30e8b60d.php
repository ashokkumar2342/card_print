<div class="row"> 
<div class="col-lg-3 form-group">
<label for="exampleInputEmail1">States</label>
<span class="fa fa-asterisk"></span>
<select name="states" id="state_id" class="form-control select2" onchange="callAjax(this,'<?php echo e(route('admin.Master.stateWiseDistrict')); ?>','district_select_box')">
<option selected disabled>Select States</option>
<?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($State->id); ?>"><?php echo e($State->code); ?>--<?php echo e($State->name_e); ?></option>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<div class="col-lg-3 form-group">
<label for="exampleInputEmail1">District</label>
<span class="fa fa-asterisk"></span>
<select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.DistrictWiseBlock')); ?>','block_select_box')">
<option selected disabled>Select District</option>
</select>
</div>
<div class="col-lg-3 form-group">
<label for="exampleInputEmail1">Block MCS</label>
<span class="fa fa-asterisk"></span>
<select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockWiseVillage')); ?>','village_select_box')">
    <option selected disabled>Select Block MCS</option> 
</select>
</div>
<div class="col-lg-3 form-group">
 <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 30px">
</div>
<div class="col-lg-12" style="margin-top: 20px"> 
<table class="table  table-bordered table-striped" id="class_section_list">
    <thead>
        <tr>
            
            <th>District</th>
            <th>Block</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $DistrictBlockAssigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DistrictBlockAssign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(isset($DistrictBlockAssign->Districts->name_l) ? $DistrictBlockAssign->Districts->name_l : ''); ?></td> 
                        <td><?php echo e(isset($DistrictBlockAssign->Blocks->name_l) ? $DistrictBlockAssign->Blocks->name_l : ''); ?></td> 
                        <td>
                         <a title="Delete" class="btn btn-xs btn-danger" select-triger="user_id" onclick="if (confirm('Are you Sure delete')){callAjax(this,'<?php echo e(route('admin.Master.DistrictBlockAssignDelete',Crypt::encrypt($DistrictBlockAssign->id))); ?>') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></a>
                        </td> 
                    </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table> 
 </div>
</div>