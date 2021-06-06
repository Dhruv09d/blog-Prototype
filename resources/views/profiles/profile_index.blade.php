@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
  <div class="sm:grid grid-col-3 gap-10 grid-flow-col w-4/5 mx-auto py-15 border-b-2 border-gray-300 ">
    <div class="mb-3">
        <img src="{{ asset('avatar/'. $profile->avatar_path) }}" class=" h-60 w-60 rounded-full mx-auto border-4" width="250" alt="">
    </div>
    <div class="col-span-2">
        <h2 class="text-gray-700 font-bold text-3xl pb-4">
           {{ $loggedin_user->name}} <a href="{{ Route('profile.edit', Auth::user()->id) }}">
            @if($loggedin_user->id === Auth::user()->id)
              <span class="text-sm font-thin"><button class="border-2 px-2 py-1 ml-2 ">Edit Profile</button></span></a>
            <a href="{{ route('blog.create') }}"><span class="text-sm font-thin"><button class="border-2 px-2 py-1 ml-2 "><span class="font-extrabold">+</span> Blog</button></span></a> 
           @endif 
        </h2>
      
        <span class="text-gray-500 mr-7">
          <span class="font-bold  text-gray-800 ">{{ $posts->count()}}</span>
          &nbsp;{{ Str::plural('Post', $posts->count()) }}
        </span>
        <span class="text-gray-500 mr-7">
          <span class="font-bold  text-gray-800 ">{{$followers->count()}}</span>
          &nbsp;Follower
        </span>
        <span class="text-gray-500">
          <span class="font-bold  text-gray-800 ">{{$followings->count()}}</span>
          &nbsp;following
        </span>
        <p class="font-bold text-gray-800 pt-8 leading-5 pb-2 font-light text-justify">
          About
        </p>
          <pre class="text-sm text-gray-700 leading-5 font-light text-justify" >{{ $profile->biography }}
          </pre>
        
        <p class="text-sm text-gray-700 pt-4 pb-10 leading-8 font-light text-justify">
          <a href="{{ $profile->instagram }}" target="_blank" class="bg-gray-100 mr-2 text-gray-700 text-sm font-normal py-2 pr-4 ">
            Instagram
          </a>
          <a href="{{ $profile->facebook }}" target="_blank" class="bg-gray-100 mr-2 text-gray-700 text-sm font-normal py-2 px-4 ">
            Facebook
          </a>
          <a href="{{ $profile->twitter }}" target="_blank" class="bg-gray-100 text-gray-700 text-sm font-normal py-2 px-4 ">
            Twitter
          </a>
        </p>
        {{-- <>testing -> {{ $followers->user_id }}</> --}}
        @if(Auth::check() && $loggedin_user->id !== Auth::user()->id && is_null($ifUserIsFollowing)) <!-- && $loggedin_user->followBy(Auth::user()) == null -->
       
          <form action="{{route('follow.user', $profile->user_id)}}" method="POST">
            @csrf
            <p class="text-sm text-white  pb-10 leading-8 font-light text-justify">
              <a href=""><span class=" text-sm font-thin"><button type="submit" class="w-3/6 bg-blue-500 border-2 ">Follow</button></span></a>
          </p>
          </form>

          @elseif ($loggedin_user->id != Auth::user()->id)
            <form action="{{route('unfollow.user', $profile->user_id)}}" method="POST">
              @csrf
              @method('DELETE')
              <p class="text-sm text-gray-500  pb-10 leading-8 font-light text-justify">
                <a href=""><span class=" text-sm font-thin"><button type="submit" class="w-3/6 border-2 border-gray-400">Unfollow</button></span></a>
            </p>
            </form>
          
        
        @endif
    </div>
  </div>
  <!-- component -->
  <!-- This is an example component -->
  
  @if($posts->isNotEmpty()))
  <div class="text-center mt-4">
    <h1 class="text-4xl font-thin text-gray-400">Posts</h1>
  </div>
  <section class="w-4/5 flex flex-row flex-wrap mx-auto ">
      <!-- Card Component -->
      
      
        @foreach ($posts as $post)
        <div
          class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3"
        >
          <div
            class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl"
          >
            <div class="md:flex-shrink-0 ">
              <img
                src="{{ asset('/images/' . $post->image_path)}}"
                alt="Blog Cover"
                class="object-fill w-full rounded-lg rounded-b-none md:h-56 "
              />
            </div>
            <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
              <span class="text-xs font-medium text-blue-600 uppercase">
      
              </span>
              <div class="flex flex-row items-center">
                {{-- <div
                  class="text-xs font-medium text-gray-500 flex flex-row items-center mr-2"
                >
                  <svg
                    class="w-4 h-4 mr-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    ></path>
                  </svg>
                  <span>1.5k</span>
                </div> --}}
      
                <div
                  class="text-xs font-medium text-gray-500 flex flex-row items-center mr-2"
                >
                  <svg
                    class="w-4 h-4 mr-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                    ></path>
                  </svg>
                  <span>{{ $post->comments->count()}}</span>
                </div>
      
                <div
                  class="text-xs font-medium text-gray-500 flex flex-row items-center"
                >
                  <svg
                    class="w-4 h-4 mr-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                    ></path>
                  </svg>
                  <span>{{ $post->likes->count()}}</span>
                </div>
              </div>
            </div>
            <hr class="border-gray-300" />
            <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
              <a href="/blog/{{ $post->slug }}/{{ $post->id }}" class="hover:underline">
                <h2 class="text-2xl font-bold tracking-normal text-gray-800">
                  {{$post->title}}
                </h2>
              </a>
            </div>
            <hr class="border-gray-300" />
            <p
              class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700"
            >
              {{ $post->description }}
            </p>
            <hr class="border-gray-300" />
            <section class="px-4 py-2 mt-2">
              <div class="flex items-center justify-between">
                <div class="flex items-center flex-1">
                  
                  <div class="flex flex-col mx-2">
                    <span class="mx-1 text-xs text-gray-600">{{ $post->updated_at->diffForHumans() }}</span>
                  </div>
                </div>
                {{-- <p class="mt-1 text-xs text-gray-600">9 minutes read</p> --}}
              </div>
            </section>
          </div>
        </div>
        @endforeach
    </section>
    @else
    <div class="my-10 text-center self-center">
      <h1 class="text-6xl font-thin text-gray-400">No post yet</h1>
    </div>
        
    @endif
</div>
@endsection