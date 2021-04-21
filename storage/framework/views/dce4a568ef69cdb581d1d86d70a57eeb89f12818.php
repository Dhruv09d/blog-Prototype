

<?php $__env->startSection('content'); ?>


<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            <?php echo e($post->title); ?>

        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800"><?php echo e($post->user->name); ?></span>, Created on <?php echo e(date('jS M Y', strtotime($post->updated_at))); ?>

    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        <?php echo e($post->description); ?>

    </p>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/blog/show.blade.php ENDPATH**/ ?>