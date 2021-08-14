@extends('layouts.adminapp')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b-2 border-gray-200">
        <h1 class="text-6xl ">
            Rejected Blog Post 
        </h1>
    </div>
    {{-- <span class="text-lg text-gray-400">Total posts rejected: <strong>{{$posts->count()}}</strong></span> --}}
</div>
@if(session()->has('message'))
@switch(session()->get('message')['msgType'])
    @case('success')
        <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
          <span>{{ session()->get('message')['msg']}}</span>
          <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
        </div>
        @break

    @case('warning')
        <div class="py-3 px-5 mb-4 bg-yellow-100 text-yellow-900 text-sm rounded-md border border-yellow-200 flex items-center justify-between" role="alert">
          <span>{{ session()->get('message')['msg']}}</span>
          <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
        </div>
        @break
    
    @case('danger')
    <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
          <span>{{ session()->get('message')['msg']}}</span>
          <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
        </div>
        @break
    @default
      <div class="py-3 px-5 mb-4 bg-gray-300 text-gray-900 rounded-md text-sm border border-gray-400 flex items-center justify-between" role="alert">
        <span>{{ session()->get('message')['msg']}}</span>
        <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endswitch
@endif
{{-- pagination --}}
<div class="container mx-auto">
    {{ $posts->links() }}
</div>
@foreach( $posts as $post)
    <div class="sm:grid grid-cols-2 gap-10 w-4/5 mx-auto py-15 border-b border-gray-200 ">
        <div >
            <img class="shadow-2xl" src="{{ asset('/images/' . $post->image_path)}}" width="500" alt="">
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
            <a href="{{ route('admin.blog_show', $post->slug)}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl shadow-lg">
                <i class="fas fa-book-open mr-2"></i>Keep Reading
            </a>
            {{-- @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id )
                <span class="float-right">
                    <a href="/blog/{{ $post->slug}}" class="shadow-2xl uppercase text-gray-700 italic hover:text-gray-900 pb-1 border-b-2"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                </span> --}}
                
                {{-- <span class="float-right">
                    <form action="/blog/{{ $post->slug }}/confirm-delete" method="POST">
                    @csrf
                        <input type="text" class="hidden" name="owner_name" value="{{ $post->user->name }}">
                        <input type="text" class="hidden" name="title" value="{{ $post->title }}">
                        <input type="text" class="hidden" name="img_path" value="{{ $post->image_path }}">
                        <input type="text" class="hidden" name="updated_at" value="{{ $post->updated_at }}">
                        <i class="far fa-trash-alt text-red-400"></i>
                        <input type="submit" class="shadow-2xl uppercase bg-gray-100 text-red-700 italic hover:text-red-900 px-3 " value="Delete">
                    </form>
                </span> 
            @endif--}}
        </div>
    </div>
@endforeach

{{-- pagination --}}
<div class="container mx-auto">
    {{ $posts->links() }}
</div>
@endsection