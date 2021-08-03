@extends('layouts.adminapp')

@section('content')
    {{-- {{ Auth::Admin()->id}} --}}
    
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
    
                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Admin | Login') }}
                    </header>
                    {{-- flash msg --}}
                    @if(session()->has('msg'))
                    <div class="py-3 px-5 mb-4 bg-red-100 text-red-600 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
                        <span>{{ session()->get('msg')}}</span>
                        <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                      </div>
                      @endif
                      {{-- Form --}}
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" 
                        action="{{ route('admin.login') }}">
                        @csrf
                        
    
                       
    
                        {{-- email --}}
                        <div class="flex flex-wrap">
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
                        </div>
                        
    
                        {{-- Password --}}
                        <div class="flex flex-wrap">
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
                        </div>
    
                       
                        
                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Login') }}
                            </button>
    
                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8 border-b-2 pb-4">
                                {{ __('Does not have account?') }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('admin.register') }}">
                                    {{ __('Register') }}
                                </a>
                            </p>
                        </div>
                        
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection