@extends('layouts.app')


@section('content')
    <div class="background-image grid grid-cols-l m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    <i class="fab fa-pied-piper-square"></i>B4BLOG
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    <i class="fas fa-blog"></i>Read more
                </a>
                
            </div>
        </div>
    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="">
            <img src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_960_720.jpg" width="700" alt="">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Why you should start blogging?
            </h2>

            <p class="py-8 text-gray-500 text-l leading-6">
                Blogging enables you to reach the billions of people that use the Internet. Blogging can help you promote yourself or your business. Blogging works as a method for attracting an audience because it provides something of value to them before asking for anything in return.
            </p>
            <p class=" text-gray-600 text-xl pb-9">
                #Share_ideas #Learn #reach_people 
            </p>
            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find out more
            </a>
        </div>
    </div>
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Let's 
        </h2>
        <span class="font-extrabold block text-4xl py-1">
            Read
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Create
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Learn
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Share
        </span>
    </div>
    <div class="text-center py-15">
        {{-- <span class="uppercase text-2xl text-gray-400">  
            Blog
        </span> --}}
        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>
        {{-- <p class="m-auto w-4/5 text-gray-500 text-s">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero accusantium fugiat ducimus incidunt! Accusantium, odio eum! Non minus voluptatibus blanditiis reprehenderit.
        </p> --}}
    </div>
    @foreach($posts as $post)
    <div class="sm:grid grid-cols-2 w-4/5 m-auto py-5 border-b">
        <div class="flex bg-yellow-700 text-gray-100 pt-2">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xl">
                    {{$post->title}}
                </span>
                <p class="pt-2 text-gray-100">
                    By <a href=""><span class="font-bold italic text-gray-100 ">{{ $post->user->name }}</span></a>
                    , Created on {{ date('jS M Y', strtotime($post->updated_at))  }}
                </p>
                <p class="text-limiting text-xl font-thin py-10">
                    {{$post->description}}
                </p>
                <a href="{{route('blog.show',[$post->slug, $post->id])}}" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find out more
                </a>
            </div>  
        </div>
        <div class="align-middle">
            <img src="{{asset('/images/'. $post->image_path)}}" alt="{{$post->title}} image" width="500">
        </div>
    </div>
    @endforeach
@endsection

