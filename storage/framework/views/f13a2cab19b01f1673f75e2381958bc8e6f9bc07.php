<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Card Print</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="<?php echo e(route('admin.card.print.print')); ?>" method="post" target="blank">
                <?php echo e(csrf_field()); ?> 
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Voter Card No.(EPIC No.)</label>
                        <input type="text" maxlength="20" name="voter_card_no" class="form-control"> 
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="submit" class="btn btn-primary form-control"> 
                    </div> 
                </div>
                </form> 
            </div>
        </div> 
    </div> 
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>