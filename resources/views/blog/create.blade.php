@extends('layouts.app')

@section('content')
<script>

</script>

<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-400">
            Create Post
        </h1>
    </div>
</div>

{{-- @error('image')
<div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
  <span>
      @foreach ($errors->all() as $error)
    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
        {{ $error }}
    </li>
    @endforeach
  </span>
  <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
      </svg>
  </button>
</div>
@enderror --}}


@if($errors->all())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
                <span>
                  <li >
                      {{ $error }}
                  </li>
                 
                </span>
                <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
              </div>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/blog/create" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title..."
        class="pb-10 bg-transparent block border-b-2 w-full h-20 text-6xl outline-none"  value={{ old('title')}}>

        <textarea name="description" placeholder="Description..."
        class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ old('description')}}</textarea>
        {{-- <div></div> --}}
        <div class="bg-gray-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg
            shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input type="file" id="selectedImg" name="image" class="hidden" 
                onchange="document.getElementById('prevImg').src = window.URL.createObjectURL(this.files[0]); document.getElementById('prevImg').style.display = 'block';" >
            </label>
        </div>
        <img id="prevImg" src="#" alt="your image" width="300" style="display:none;"/>

        <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg
        font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>

    </form>
</div>



@endsection