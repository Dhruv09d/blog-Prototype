<nav id="footer" class="bg-black relative text-center  bottom-0 inset-x-0 mt-4">

    <!-- start container -->
    <div class="container mx-auto pt-8 pb-4 ">

        <div class="flex flex-wrap overflow-hidden sm:text-center sm:-mx-1 md:-mx-px lg:-mx-2 xl:-mx-2">

            <div class="w-full overflow-hidden sm:my-1 sm:text-center sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 1 Content -->
                <img style="mx-0;height:auto;" class="" src="{{ asset('/logo/b4blogf.png') }}" alt="Logo">
            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 2 Content -->


                <h4 class="text-white ">B4BLOG</h4>
                <ul class="nav navbar-nav">
                    <li id="navi-2" class="leading-7 text-sm">
                        <a class="text-white underline text-small no-underline" href="{{ route('blog.index')}}">
                            Blogs</a>
                    </li>
                    <li id="navi-1" class="leading-7 text-sm no-underline"><a class="text-white underline text-small no-underline" href="#">Profiles</a></li>
                </ul>


            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 3 Content -->
                <h4 class="text-white">BLOG</h4>
                <ul class="">
                <li id="navi-2" class="leading-7 text-sm">
                    <a class="text-white underline text-small no-underline" href="{{ route('blog.index')}}">
                        Read</a>
                </li>
                <li id="navi-1" class="leading-7 text-sm"><a class="text-white underline text-small no-underline" href="{{ route('blog.create')}}">Create</a></li>
                </ul>
            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 4 Content -->

                <h4 class="text-white">Profiles</h4>
                <ul class="">
                <li id="navi-2" class="leading-7 text-sm">
                    <a class="text-white underline text-small no-underline" href="/page-1">
                       View</a>
                </li>
                <li id="navi-1" class="leading-7 text-sm"><a class="text-white underline text-small no-underline" href="{{ route('feedbackform')}}">Feedback</a></li>
                </ul>
            </div>

        </div>



        <!-- Start footer bottom -->

        <div class="pt-4 md:flex md:items-center md:justify-center " style="border-top:1px solid white">
            <ul class="">
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="/disclaimer">Disclaimer</a></li>
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="/cookie">Cookie policy</a></li>
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="{{ route('aboutandprivacypage')}}">Privacy</a></li>
                </ul>
            </div>


        <!-- end container -->
        </div>



</nav>