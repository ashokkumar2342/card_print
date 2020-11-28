<?php $__env->startSection('body'); ?>
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h3>Tables</h3>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
</ol>
</div>
</div> 
<div class="card">
<div class="card-body">
<form action="<?php echo e(route('admin.database.conection.tableRecordStore')); ?>" method="post" class="add_form" no-reset="true">
<?php echo e(csrf_field()); ?> 
<div class="row"> 
 <div class="col-lg-12 form-group">
    <label>Assembly Code</label>
    <select name="ac_code" class="form-control" multiselect-form="true" onchange="callAjax(this,'<?php echo e(route('admin.database.conection.assemblyWisePartNo')); ?>','part_no_div')">
        <option selected disabled>Select Assembly Code</option> 
        <?php $__currentLoopData = $assemblys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assembly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <option value="<?php echo e($assembly->id); ?>"><?php echo e($assembly->code); ?>--<?php echo e($assembly->name_e); ?></option> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
     </select> 
 </div>
  <div class="col-lg-12 form-group">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                <td>
                 <div class="icheck-primary d-inline">
                 <input type="checkbox" id="all_check" class="checked_all">
                 <label for="all_check" class="checked_all">All</label>
                </td>
                  <th>Part No.</th>
                  <th>Total Import</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody id="part_no_div">
              
          </tbody>
      </table>
  </div>
 
<div class="col-lg-12 form-group">
<button type="submit" class="btn btn-primary form-group form-control" >Submit</button>
</div>
</div>
</form> 
</div>
</div>  
</div>
</section>
<?php $__env->stopSection(); ?> 
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

// setInterval(statusbarStart,5000);

// function statusbarStart() {
//     $.ajax({
//         
//         type: 'GET',

//     })
//     .done(function(response) {
//        $('#process').html(response)
//     })
//     .fail(function() {
//         console.log("error");
//     })
//     .always(function() {
//         console.log("complete");
//     });

//   

// }
//  setInterval(statusbarStart,1000);

//  $(document).ready(function(){ 
//     function statusbarStart(){
//       $.get('file.txt', function(data) {

//     });  
//     }

// });
$("#all_check").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});

</script> 
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>