@extends('layouts.app')

@section('content')






@if(Auth::check())
<div class="bg-create-post grid grid-cols-l m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <a  href="/blog/create" role="button" class=" hover:bg-yellow-800 text-white text-2xl font-extrabold py-4 px-6 border-yellow-400 border-8 border rounded-2xl">
                <i class="far fa-edit mr-2"></i>CREATE POST
            </a>
        </div>
    </div>
</div>
@endif

<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b-2 border-gray-200">
        <h1 class="text-6xl">
            Blog Post
        </h1>
    </div>
</div>
@if (session()->has('message'))
    <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
    <span>{{ session()->get('message')}}</span>
    <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
  </div>
@endif

@foreach( $posts as $post)
    <div class="sm:grid grid-cols-2 gap-10 w-4/5 mx-auto py-15 border-b border-gray-200 ">
        <div>
            <img src="{{ asset('/images/' . $post->image_path)}}" width="500" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>
            <span class="text-gray-500">
                By <a href=""><span class="font-bold italic text-gray-800 ">{{ $post->user->name }}</span></a>
                , Created on {{ date('jS M Y', strtotime($post->updated_at))  }}
            </span>
            <p id="text-limit" class="text-limiting text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>
            <a href="/blog/{{ $post->slug }}/{{ $post->id }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                <i class="fas fa-book-open mr-2"></i>Keep Reading
            </a>
            @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id )
                <span class="float-right">
                    <a href="/blog/{{ $post->slug}}" class="uppercase text-gray-700 italic hover:text-gray-900 pb-1 border-b-2"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                </span>
                
                <span class="float-right">
                    <form action="/blog/{{ $post->slug }}/confirm-delete" method="POST">
                    @csrf
                        <input type="text" class="hidden" name="owner_name" value="{{ $post->user->name }}">
                        <input type="text" class="hidden" name="title" value="{{ $post->title }}">
                        <input type="text" class="hidden" name="img_path" value="{{ $post->image_path }}">
                        <input type="text" class="hidden" name="updated_at" value="{{ $post->updated_at }}">
                        <i class="far fa-trash-alt text-red-400"></i>
                        <input type="submit" class="uppercase bg-gray-100 text-red-700 italic hover:text-red-900 px-3 " value="Delete">
                    </form>
                </span>
            @endif
        </div>
    </div>
@endforeach

@endsection