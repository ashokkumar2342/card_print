<?php if(Session::has('message')): ?>

<script type="text/javascript">
    Command: toastr["<?php echo e(Session::get('class')); ?>"]("<?php echo e(Session::get('message')); ?>");
</script>
<?php endif; ?>