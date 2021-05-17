

<?php $__env->startSection('content'); ?>
<div class="text-6xl">
    <h1>This is profile index</h1>

    <form action="<?php echo e(route('profile.create', Auth::user()->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="submit"  value="Create">
    </form>
    
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_index.blade.php ENDPATH**/ ?>