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
                @if(session()->has('isreported')) 
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Report') }}
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
                    action="{{ route('report.report') }}">
                    @csrf
                    <input type="hidden" name="complainent_id" value="{{$complainent_id}}">
                    <input type="hidden" name="post_id" value="{{$post_id}}">
                    {{-- reason --}}
                    <div class="flex flex-wrap">
                        <label for="selectedType" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Select reason') }}:
                        </label>

                        <select id="selectedType" onclick="enableTextArea(this)"  class="form-input w-full @error('selectedType')  border-red-500 @enderror"
                            name="selectedType" value="{{ old('selectedType') }}"  autocomplete="selectedType" autofocus>
                            <option value="">
                                Select an option
                            </option>
                            <option value="it's spam">
                                it's spam
                            </option>
                            <option value="Nudity or sexual activity">
                                Nudity or sexual activity
                            </option>
                            <option value="I just don't like it">
                                I just don't like it
                            </option>
                            <option value="Scam or fraud">
                                Scam or fraud
                            </option>
                            <option value="Hate Speech or Symbols">
                                Hate Speech or Symbols
                            </option>
                            <option value="False Information">
                                False Information
                            </option>
                            <option value="Bullying or harassment">
                                Bullying or harassment
                            </option>
                            <option value="Violence or dangerous organisations">
                                Violence or dangerous organisations
                            </option>
                            <option value="Intellectual property voilation">
                                Intellectual property voilation
                            </option>
                            <option value="Sale of illegal or regulated good">
                                Sale of illegal or regulated good
                            </option>
                            <option value="Suicide or self-injury">
                                Suicide or self-injury
                            </option>
                            <option value="Eating disorder">
                                Eating disorder
                            </option>
                            <option value="Other">
                                Other
                            </option>
                        </select>
                        @error('selectedType')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                   
                    {{-- reason --}}
                    <div class="flex flex-wrap">
                        <label for="reason" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Other (specify if selected "other")') }}:
                        </label>

                        <textarea disabled="disabled" id="reason"  rows="5" class=" form-input w-full @error('reason')  border-red-500 @enderror"
                            name="reason"  autocomplete="reason" autofocus>{{ old('reason') }}</textarea>

                        @error('reason')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Report') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8 border-b-2 pb-4">
                            {{-- {{ __('Already have an account?') }} --}}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('blog.index') }}">
                                {{ __('Cancel') }}
                            </a>
                        </p>
                    </div>
                    
                </form>
               @endif
               @if(!session()->has('isreported')) 
                    <p class="py-10 my-20 text-2xl font-bold mx-auto">
                        Your record has already been recorded. Thanks for helping in keeping this community safe.
                    </p>
               @endif
            </section>
        </div>
    </div>
</div>
{{-- </main> --}}

@endsection