@extends('layouts.app')

@section('content')
{{-- <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10"> --}}
<main class="container mx-auto w-6/12">
    <div class="py-6 mt-0 mb-3 border-gray-200 border-1 rounded-xl bg-gray-200 mx-auto">
        <p class="font-bold text-xl mb-2 ml-2">Your Feedback is valuable to us.</p>
        {{-- <p class="ml-2">
            If someone is in immediate danger, call the local emergency without any delay. 
        </p> --}}
    </div>
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Feedback') }}
                </header>
                @if (session()->has('msg'))
                    <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
                        <span>{{ session()->get('msg')}}</span>
                        <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" enctype="multipart/form-data"
                    action="{{ route('storeFeeeback') }}">
                    @csrf
                    {{-- feedback --}}
                    <div class="flex flex-wrap">
                        <label for="feedback" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Feedback Or Suggestion') }}:
                        </label>

                        <textarea id="feedback" rows="6" class="form-input w-full @error('feedback')  border-red-500 @enderror"
                            name="feedback" value="{{ old('feedback') }}"  autocomplete="feedback" autofocus></textarea>

                        @error('feedback')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Send') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8 border-b-2 pb-4">
                            
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('blog.index') }}">
                                {{ __('Cancel') }}
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

@endsection