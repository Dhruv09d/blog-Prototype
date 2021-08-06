@extends('layouts.app')

@section('content')

{{-- <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10 w-full"> --}}
<div class="container mx-auto w-6/12">  
    <div class="py-6 mt-0 mb-3 border-gray-200 border-1 rounded-xl bg-gray-200">
        <p class="font-bold text-xl mb-2 ml-2">Why are you reporting this post?</p>
        <p class="ml-2">
            If someone is in immediate danger, call the local emergency without any delay.
        </p>
    </div>
    <div class="flex ">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Report') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.create') }}">
                    @csrf
                    {{-- fname --}}
                    <div class="flex flex-wrap">
                        <label for="fname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('First Name') }}:
                        </label>

                        <input id="fname" type="text" class="form-input w-full @error('fname')  border-red-500 @enderror"
                            name="fname" value="{{ old('fname') }}"  autocomplete="fname" autofocus>

                        @error('fname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- lname --}}
                    <div class="flex flex-wrap">
                        <label for="lname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Last Name') }}:
                        </label>

                        <input id="lname" type="text" class="form-input w-full @error('lname')  border-red-500 @enderror"
                            name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>

                        @error('lname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- email --}}
                    {{-- <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div> --}}
                    {{-- other --}}
                    <div class="flex flex-wrap">
                        <label for="other" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Other (specify if selected "other")') }}:
                        </label>

                        <input id="other" type="text" class="form-input w-full @error('other')  border-red-500 @enderror"
                            name="phno"  value="{{ old('other') }}"  autocomplete="other" autofocus>

                        @error('phno')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    {{-- <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                             autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div> --}}

                    {{-- password confirm --}}
                    {{-- <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation"  autocomplete="new-password">
                    </div> --}}
                    {{-- image --}}
                    {{-- <div class="flex flex-wrap">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Profile Image') }}:
                        </label>

                        <input id="image" type="file" class="form-input w-full @error('image')  border-red-500 @enderror"
                            name="image" value="{{ old('image') }}"  autofocus>

                        @error('image')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div> --}}
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8 border-b-2 pb-4">
                            {{-- {{ __('Already have an account?') }} --}}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('admin.loginpage') }}">
                                {{ __('Cancel') }}
                            </a>
                        </p>
                    </div>
                    
                </form>
                {{-- <div class="flex flex-wrap">
                    <a class="w-2/5 select-none text-center mx-auto font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-700 sm:py-4 mb-2" href="{{route('login.google')}}"><button>Google</button></a>

                    <a  class="w-2/5 select-none text-center mx-auto font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-gray-800 hover:bg-black sm:py-4 mb-2" href="{{route('login.github')}}"><button>Github</button></a>

                    <a  class="w-2/5 select-none text-center mx-auto font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-900 duration-300 rounded-sm hover:bg-blue-700 sm:py-4 mb-2" href="{{route('login.facebook')}}"><button>facebook</button></a>
                </div> --}}
            </section>
        </div>
    </div>
</div>
{{-- </main> --}}

@endsection