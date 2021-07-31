<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/89bf85d196.js" crossorigin="anonymous"></script>    
 

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        
        
        <header class=" bg-black py-2 ">
            
                <nav class="container flex items-center mx-auto  flex-wrap">
                    <a href="<?php echo e(url('/')); ?>" class="p-2 mr-4 inline-flex items-center">
                    
                    <img style="max-width: 70%;height:auto;" class="" src="<?php echo e(asset('/logo/b4blogf.png')); ?>" width="250" alt="Logo">
                    
                    </a>
                    <button 
                    class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto mr-5 hover:text-white outline-none nav-toggler sm:text-5xl"
                    data-target="#navigation"
                    
                    onclick = 'showmenu();'
                    >
                    <i class="fas fa-user-minus"></i>
                    
                    </button>
                    <div
                    class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
                    id="navigation"
                    >
                    <div
                        class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto"
                    >
                        <a
                        href="<?php echo e(url('/')); ?>"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Home</span>
                        </a>
                        <a
                        href="<?php echo e(url('/blog')); ?>"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Blogs</span>
                        </a>
                        <a
                        href="<?php echo e(route('profile.show')); ?>"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Profiles</span>
                        </a>
                        
                        <?php if(auth()->guard()->guest()): ?>
                        <a
                        href="<?php echo e(route('login')); ?>"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Login</span>
                        </a>
                            <?php if(Route::has('register')): ?>
                                <a
                                href="<?php echo e(route('register')); ?>"
                                class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                                >
                                <span><?php echo e(__('Register')); ?></span>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                                <a
                                href="<?php echo e(route('profile.index', Auth::user()->id)); ?> "
                                class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                                >
                                <span><?php echo e(Auth::user()->name); ?></span>
                                </a>
                            
                                <a
                                href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                                >
                                <span><?php echo e(__('Logout')); ?></span>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                                <?php endif; ?>
                        
                        
                        
                    </div>
                    </div>
                </nav>
            
        </header>
        
        <div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/layouts/app.blade.php ENDPATH**/ ?>