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
       
    @endif
    <span>{{ $post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>

<!-- Comment Section -->
<!-- comment form -->
<div class=" container w-4/5 mx-auto pt-10">
    <section class="rounded-b-lg  mt-4 ">
        <form action="{{ route('posts.comment', $post->id)}}"  method="POST">
            @csrf
            <textarea class="bg-gray-150 w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="Ask questions here." name="comment" cols="10" rows="4" id="comment_content" spellcheck="false"></textarea>
            <button type="submit" class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Comment</button>
        </form>
        @foreach($comments as $comment)
        <div id="task-comments" class="pt-4">
            <!--     comment-->
            <div class="bg-gray-100 rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
            <div class="flex flex-row justify-center mr-2">
                @if (!empty($comment->user->profile->avatar_path))
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{ asset('avatar/'. $comment->user->profile->avatar_path) }}">
                @else 
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{ asset('defaultAvatar/avatar-1299805_640.png') }}">
                @endif
                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->user->name }} <span class="text-gray-400 text-sm ml-3">{{ $comment->updated_at->diffForHumans() }}</span></h3>
                
            </div>
                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $comment->comment }} </p>
                @if( Auth::user()->id === $comment->user_id || Auth::user()->id === $post->user->id) 
                <form action="{{route('posts.removeComment', $comment->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-t-2 pt-2 mt-2 text-gray-400 text-sm text-red-500 pr-3 hover:text-red-700">Delete</button>
                </form>
                
                @endif
            </div>
        @endforeach
        <!--  comment end-->
            
        </div>
    </section>
</div>


@endsection