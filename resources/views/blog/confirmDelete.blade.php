@extends('layouts.app')

@section('content')


<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            Delete Post
        </h1>
    </div>
</div>



<div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-5 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-4 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <div>
                        <img src="{{ asset('/images/' . $post_image)}}" width="700" alt="">
                    </div>
                </div>

                <form action="/blog/{{ $slug }}/delete" method="POST" class="p-6 flex flex-col justify-center">
                    @csrf
                    @method('DELETE')
                    <div class="flex flex-col">
                        <h2 class="text-gray-700 font-bold text-6xl pb-4">
                            {{ $post_title }}
                        </h2>
                        <span class="text-gray-500">
                            By <span class="font-bold italic text-gray-800 ">{{ $post_owner_name }}</span>
                            , Created on {{ date('jS M Y', strtotime($post_updated_at))  }}
                        </span>
                    </div>

                    <div class="flex flex-col mt-2">
                        
                    </div>

                    <div class="flex flex-col mt-2">
                       
                    </div>

                    <button type="submit" class="md:w-32 bg-red-700 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-red-600 transition ease-in-out duration-300">
                        Submit
                    </button>
                    <a href="{{ route('blog.index') }}" class="md:w-32 text-center justify-center bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection