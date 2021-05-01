@extends('layouts.app')

@section('content')


<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>

<div class="flex items-center w-4/5 m-auto pt-10">
    @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.like', $post->id)}} " method="POST" class="mr-4">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>

    @else 
        <form action="{{ route('posts.unlike', $post->id)}}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        <span>{{ $post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}</span>
    @endif
</div>
   


@endsection