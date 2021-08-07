<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/89bf85d196.js" crossorigin="anonymous"></script>    
    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        {{-- <header class="bg-black py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                        <img style="max-width: 70%;height:auto;" class="" src="{{ asset('/logo/b4blogf.png') }}" width="250" alt="Logo">
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/blog">Blogs</a>
                    <a class="no-underline hover:underline" href="{{ route('profile.show')}}">Profiles</a>

                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span><a href="{{ route('profile.index', Auth::user()->id)}} ">{{ Auth::user()->name }}</a></span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header> --}}
        {{-- 2nd navbar --}}
        
        <header class=" bg-black py-2 ">
            {{-- <div class=" container bg-black mx-auto"> --}}
                <nav class="container flex items-center mx-auto  flex-wrap">
                    <a href="{{ route('admin.dashboard') }}" class="p-2 mr-4 inline-flex items-center">
                    {{-- <svg
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        class="fill-current text-white h-8 w-8 mr-2"
                    >
                        <path
                        d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"
                        />
                    </svg> --}}
                    <img style="max-width: 70%;height:auto;" class="" src="{{ asset('/logo/b4blogf.png') }}" width="250" alt="Logo">
                    {{-- <span class="text-xl text-white font-bold uppercase tracking-wide"
                        >Talwind CSS</span
                    > --}}
                    </a>
                    @if(session()->has('adminId'))
                    <button 
                    class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto mr-5 hover:text-white outline-none nav-toggler sm:text-3xl md:text-3xl"
                    data-target="#navigation"
                    
                    onclick = 'showmenu();'
                    >
                    <i class="fas fa-user-minus"></i>
                    {{-- <i class="material-icons">menu</i> --}}
                    </button>
                    <div
                    class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
                    id="navigation"
                    >
                    <div
                        class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto"
                    >
                        <a
                        href="{{ route('admin.dashboard') }}"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Dashboard</span>
                        </a>
                        <a
                        href="{{ url('/') }}"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Home</span>
                        </a>
                        <div>
                            <button
                            onclick="blogDropdown()"
                            {{-- href="{{ route('admin.blog_request') }}" --}}
                            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                            >
                            <span ><i class="fas fa-angle-down mr-1"></i>Blogs</span>
                            </button>
                                <div class="hidden mt-2 absolute  mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20" id="blogDropdowns">
                                    
                                <a href="{{ route('admin.blog_request') }}" class="block px-4 py-3 text-sm text-gray-800 border-b hover:bg-gray-200">New Blogs<span class="text-gray-600"></span></a>
                                <a href="{{ route('admin.blog_approved') }}" class="block px-4 py-3 text-sm text-green-400 border-b hover:bg-gray-200">Approved Blogs <span class="text-gray-600"></span></a>
                                <a href="{{ route('admin.blog_rejected') }}" class="block px-4 py-3 text-sm text-red-400 border-b hover:bg-gray-200">Rejected Blogs <span class="text-gray-600"></span></a>
                                <a href="{{ route('admin.allfeddbacks') }}" class="block px-4 py-3 text-sm text-gray-800 border-b hover:bg-gray-200">Feedbacks <span class="text-gray-600"></span></a>
                                <a href="{{ route('admin.allreports') }}" class="block px-4 py-3 text-sm text-gray-800 border-b hover:bg-gray-200">Blog Reports<span class="text-gray-600"></span></a>
                                </div>  
                        </div>
                        <a
                        href="{{ route('profile.show')}}"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Profiles</span>
                        </a>
                        {{-- auth start --}}
                        <a
                        href="#"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>{{ session()->get('adminFname')}}</span>
                        </a>
                        <a
                        href="{{ route('admin.logout') }}"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Logout</span>
                        </a>
                        {{-- auth end --}}
                        {{-- <a
                        href="#"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Register</span>
                        </a> --}}
                        {{-- <a
                        href="#"
                        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                        >
                        <span>Contact Us</span>
                        </a> --}}
                    </div>
                    @endif
                    </div>
                </nav>
            {{-- </div> --}}
        </header>

        {{-- 2nd navbar end --}}
        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.adminfooter')
        </div>
        
    </div>
</body>
</html>
