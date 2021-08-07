@extends('layouts.adminapp')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b-2 border-gray-200">
        <h1 class="text-6xl ">
            Feedbacks
        </h1>
    </div>
    <span class="text-lg text-gray-400">Total Feedbacks: <strong>{{$feedbacks->count()}}</strong></span>
</div>
@foreach($feedbacks as $feedback)
<div class="w-4/5 my-5 mx-auto bg-gray-100 text-justify ">
    <div class="containter mx-auto px-2">
      <div class="bg-white p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500">
        <h1 class="text-2xl text-gray-800 font-semibold mb-3">{{$feedback->user->name}} <span class=" ml-2 text-sm text-gray-300 font-bold italic">Created on {{ date('jS M Y', strtotime($feedback->created_at))  }}</span></h1>
        <p class="text-gray-600 leading-6 tracking-normal">{{ $feedback->feedback}}</p>
    <button  class="py-2 px-4 mt-8 bg-black text-white rounded-md shadow-xl">Read</button>
    
        {{-- <div>
          <span class="absolute py-2 px-8 text-sm text-white top-0 right-0 bg-indigo-600 rounded-md transform translate-x-2 -translate-y-3 shadow-xl">Read</span>
        </div> --}}
      </div>
    </div>
  </div>
  @endforeach
  <div class="container mx-auto">
    {{ $feedbacks->links() }}
</div>
@endsection