

<?php $__env->startSection('content'); ?>


<div class="w-4/5 m-auto text-left">
    <div class="py-10 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            <?php echo e($post->title); ?>

        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-10">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800"><?php echo e($post->user->name); ?></span>, Created on <?php echo e(date('jS M Y', strtotime($post->updated_at))); ?>

    </span>
    <?php if(Auth::user()->id !== $post->user_id): ?>
    <span class="float-right">
        <form action="<?php echo e(route('report.reportForm', [Auth::user()->id, $post->id])); ?>">
            <i class="far fa-flag text-red-400"></i>
            <input type="submit" class="uppercase bg-gray-100 text-red-700 italic hover:text-red-900 px-3 " value="Report">
        </form>
    </span>
    <?php endif; ?>
    <?php if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id ): ?>
                <span class="float-right">
                    <a href="/blog/<?php echo e($post->slug); ?>" class="uppercase text-gray-700 italic hover:text-gray-900 pb-1 border-b-2"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                </span>
                
                <span class="float-right">
                    <form action="/blog/<?php echo e($post->slug); ?>/confirm-delete" method="POST">
                    <?php echo csrf_field(); ?>
                        <input type="text" class="hidden" name="owner_name" value="<?php echo e($post->user->name); ?>">
                        <input type="text" class="hidden" name="title" value="<?php echo e($post->title); ?>">
                        <input type="text" class="hidden" name="img_path" value="<?php echo e($post->image_path); ?>">
                        <input type="text" class="hidden" name="updated_at" value="<?php echo e($post->updated_at); ?>">
                        <i class="far fa-trash-alt text-red-400"></i>
                        <input type="submit" class="uppercase bg-gray-100 text-red-700 italic hover:text-red-900 px-3 " value="Delete">
                    </form>
                </span>
        <?php endif; ?>
    <div class="my-10">
        <img class="mx-auto shadow-2xl" src="<?php echo e(asset('/images/'.$post->image_path)); ?>" alt="post image" width="1200">
    </div>
    
    </p>
    <div class="">
        <pre class="text-lg text-justify text-gray-700 font-light pt-8 pb-10 whitespace-pre-line break-all leading-tight font-serif " ><?php echo e($post->description); ?>

        </pre>
    </div>

</div>

<div class="flex items-center w-4/5 m-auto pt-10">
    
    <?php if(!$post->likedBy(auth()->user())): ?>
        <form action="<?php echo e(route('posts.like', $post->id)); ?> " method="POST" class="mr-1">
            <?php echo csrf_field(); ?>
            <button type="submit" class="text-blue-500 text-2xl"><i class="far fa-heart"></i></button>
        </form>

    <?php else: ?> 
    
        <form action="<?php echo e(route('posts.unlike', $post->id)); ?>" method="POST" class="mr-1">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="text-blue-500 text-2xl b-none"><i class="fas fa-heart text-red-500 text-2xl "></i></button>
        </form>
       
    <?php endif; ?>
    <span class="ml-2"><?php echo e($post->likes->count()); ?> <?php echo e(Str::plural('like', $post->likes->count())); ?></span>
    <span class="ml-4 text-2xl"><i class="far fa-comment"></i></span>
    <span class="ml-1"><?php echo e($post->comments->count()); ?> <?php echo e(Str::plural('comment', $post->comments->count())); ?></span>
</div>

<!-- Comment Section -->
<!-- comment form -->
<div class=" container w-4/5 mx-auto pt-10">
    <section class="rounded-b-lg  mt-4 ">
        <form action="<?php echo e(route('posts.comment', $post->id)); ?>"  method="POST">
            <?php echo csrf_field(); ?>
            <textarea class="bg-gray-150 w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="Comment here." name="comment" cols="10" rows="4" id="comment_content" spellcheck="false"></textarea>
            <button type="submit" class="font-bold py-2 px-4 w-full bg-gray-700 text-lg text-white shadow-md rounded-lg ">Comment</button>
        </form>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="task-comments" class="pt-4">
            <!--     comment-->
            <div class="bg-gray-100 rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
            <div class="flex flex-row justify-center mr-2">
                <?php if(!empty($comment->user->profile->avatar_path)): ?>
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="<?php echo e(asset('avatar/'. $comment->user->profile->avatar_path)); ?>">
                <?php else: ?> 
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="<?php echo e(asset('defaultAvatar/avatar-1299805_640.png')); ?>">
                <?php endif; ?>
                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left "><?php echo e($comment->user->name); ?> <span class="text-gray-400 text-sm ml-3"><?php echo e($comment->updated_at->diffForHumans()); ?></span></h3>
                
            </div>
                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "><?php echo e($comment->comment); ?> </p>
                <?php if( Auth::user()->id === $comment->user_id || Auth::user()->id === $post->user->id): ?> 
                <form action="<?php echo e(route('posts.removeComment', $comment->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="border-t-2 pt-2 mt-2 text-gray-400 text-sm text-red-500 pr-3 hover:text-red-700"><i class="far fa-trash-alt text-red-400 mr-2"></i>Delete</button>
                </form>
                
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--  comment end-->
            
        </div>
    </section>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/blog/show.blade.php ENDPATH**/ ?>