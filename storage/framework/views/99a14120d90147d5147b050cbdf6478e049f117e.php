

<?php $__env->startSection('content'); ?>
<div class="text-6xl">
    <h1>This is profile View</h1>
    <?php if(session()->has('message')): ?>
    <h4><?php echo e(session()->get('message')); ?></h4>
    <?php endif; ?>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_view.blade.php ENDPATH**/ ?>