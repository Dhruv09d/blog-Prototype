

<?php $__env->startSection('content'); ?>
<style>
    .pImg {
        background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
        background-repeat: no-repat;
        background-size: cover;
        background-blend-mode: multiply;
    }
</style>

<div class="container  min-h-screen mt-2 mx-auto">
    <div class="w-4/5 m-auto text-left">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-400 pb-5">
                Profiles
            </h1>
            <hr>
        </div>
    </div>
    <div class="container mx-auto">
        <?php echo e($profiles->links()); ?>

    </div>

<div class=" grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 m-5 mb-10">
<?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    


    <div class="bg-gray-100 inline">
        <div class=" bg-white  shadow-lg rounded-lg hover:shadow-xl transition duration-200 max-w-sm">
        <img class="rounded-t-lg mx-auto w-full" src="<?php echo e(asset('/avatar/'. $profile->avatar_path)); ?>" alt="" />
        <div class="py-4 px-8">
            <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight"><?php echo e($profile->user->name); ?></h1>
            <p class="hover:cursor-pointer py-3 text-gray-600 leading-6"><?php echo e($profile->biography); ?></p>
            
            <p class="hover:cursor-pointer py-3 text-gray-600 leading-6 inline-block">Joined Since <strong><?php echo e(date('Y', strtotime($profile->user->updated_at))); ?></strong></p>
            <a class="inline-block float-right bg-gray-800 text-white" href="<?php echo e(route('profile.index', $profile->user_id)); ?>"><button class="border-2 p-2 border-white rounded-2xl inline-block">View Profile</button></a>
            
        </div>
        </div>
    </div>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="container mx-auto">
    <?php echo e($profiles->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_view.blade.php ENDPATH**/ ?>