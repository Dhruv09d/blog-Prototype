

<?php $__env->startSection('content'); ?>
<div class="text-6xl">
    <?php if(session()->has('message')): ?>
    <h4><?php echo e(session()->get('message')); ?></h4>
    <?php endif; ?>
</div>
<div class="text-6xl">
    <h1>This is profile index</h1> <br>
   <div>
        <a href="<?php echo e(route('profile.create', Auth::user()->id)); ?>" class="bg-pink-500">Create</a>
        <a href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>" class="bg-blue-500">Edit</a>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_index.blade.php ENDPATH**/ ?>