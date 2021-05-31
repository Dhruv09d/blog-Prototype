

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
                Accounts
            </h1>
            <hr>
        </div>
    </div>
<?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <div class="  flex flex-row flex-wrap p-3">
        <div class="mx-auto w-2/3">
            <!-- Profile Card -->
            <div class="rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased pImg">
                <div class="md:w-1/3">
                <img class="rounded-lg shadow-lg h-36 w-36 antialiased" src="<?php echo e(asset('avatar/'. $profile->avatar_path)); ?>">  
                </div>
                <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
                <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                    <div class="text-2xl text-white leading-tight mb-2"><?php echo e($profile->user->name); ?></div>
                    <div class="text-normal text-gray-300 mb-1 "><span class="border-b border-dashed border-gray-500 pb-2"><strong>XX</strong> Followers</span></div>
                    <div class="text-normal text-gray-300 mb-1"><span class="border-b border-dashed border-gray-500 pb-1">Joined Since <strong><?php echo e(date('Y', strtotime($profile->user->updated_at))); ?></strong></span></div>
                    
                    <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0"><a href="<?php echo e(route('profile.index', $profile->user_id)); ?>"><button class="border-2 p-2 border-white rounded-2xl">View Profile</button></a> </div>
                </div>
                </div>
            </div>
            <!-- End Profile Card -->
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_view.blade.php ENDPATH**/ ?>