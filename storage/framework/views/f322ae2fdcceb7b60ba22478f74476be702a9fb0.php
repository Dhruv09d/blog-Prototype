

<?php $__env->startSection('content'); ?>


<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            Create Post
        </h1>
    </div>
</div>




<?php if($errors->all()): ?>
    <div class="w-4/5 m-auto">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    <?php echo e($error); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

<?php endif; ?>

<div class="w-4/5 m-auto pt-20">
    <form action="/blog/create" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="text" name="title" placeholder="Title..." 
        class="pb-10 bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea name="description" placeholder="Description..."
        class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <div class="bg-gray-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg
            shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input type="file" name="image" class="hidden">
            </label>
        </div>

        <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg
        font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>

    </form>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/blog/create.blade.php ENDPATH**/ ?>