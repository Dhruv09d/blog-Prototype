@extends('layouts.app')

@section('content')


<div class="w-4/5 m-auto text-left">
    <div class="py-10 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-10">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>
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
    <div class="my-10">
        <img class="mx-auto" src="{{asset('/images/'.$post->image_path)}}" alt="post image" width="1200">
    </div>
    {{-- <p class="text-xl text-justify text-gray-700 font-light pt-8 pb-10 leading-8 ">
        {{ $post->description }} --}}
    </p>
    <div class="">
        <pre class="text-lg text-justify text-gray-700 font-light pt-8 pb-10 whitespace-pre-line break-all leading-tight font-serif " >{{ $post->description }}
        </pre>
    </div>

</div>

<div class="flex items-center w-4/5 m-auto pt-10">
    {{-- Like --}}
    @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.like', $post->id)}} " method="POST" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500 text-2xl"><i class="far fa-heart"></i></button>
        </form>

    @else 
    {{-- unlike --}}
        <form action="{{ route('posts.unlike', $post->id)}}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500 text-2xl b-none"><i class="fas fa-heart text-red-500 text-2xl "></i></button>
        </form>
       
    @endif
    <span class="ml-2">{{ $post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}</span>
    <span class="ml-4 text-2xl"><i class="far fa-comment"></i></span>
    <span class="ml-1">{{ $post->comments->count()}} {{ Str::plural('comment', $post->comments->count()) }}</span>
</div>

<!-- Comment Section -->
<!-- comment form -->
<div class=" container w-4/5 mx-auto pt-10">
    <section class="rounded-b-lg  mt-4 ">
        <form action="{{ route('posts.comment', $post->id)}}"  method="POST">
            @csrf
            <textarea class="bg-gray-150 w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="Comment here." name="comment" cols="10" rows="4" id="comment_content" spellcheck="false"></textarea>
            <button type="submit" class="font-bold py-2 px-4 w-full bg-gray-700 text-lg text-white shadow-md rounded-lg ">Comment</button>
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
                    <button type="submit" class="border-t-2 pt-2 mt-2 text-gray-400 text-sm text-red-500 pr-3 hover:text-red-700"><i class="far fa-trash-alt text-red-400 mr-2"></i>Delete</button>
                </form>
                
                @endif
            </div>
        @endforeach
        <!--  comment end-->
            
        </div>
    </section>
</div>


@endsection