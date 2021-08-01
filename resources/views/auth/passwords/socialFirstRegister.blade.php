@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Create Password
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login.socialpw') }}">
                    @csrf
                    <input type="hidden" value={{$name}} name="name">
                    <input type="hidden" value={{$email}} name="email">
                    <label for="" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{$email}}
                    </label>
                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Password
                        </label><br>
                        <label id="errpass" class="ml-4 block text-red-500 text-sm font-bold mb-2 sm:mb-4">
                            
                        </label>
                        {{-- <p id="errpass" class="text-red-500"></p> --}}
                        <input id="password" type="password" onmouseout="checkPass()"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            >

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="cpassword" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Confirm Password
                        </label>
                        <label id="errcpass" class=" ml-4 block text-red-500 text-sm font-bold mb-2 sm:mb-4">
                            
                        </label>
                        {{-- <p id="errcpass" class="text-red-500"></p> --}}
                        <input id="cpassword" type="password" onmouseout="checkPass()"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="cpassword"
                            >

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    

                    <div class="flex flex-wrap">
                        <button type="submit" 
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline mb-5 text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Save
                        </button>

                    </div>
                </form>
                
            </section>
        </div>
    </div>
</main>
@endsection
