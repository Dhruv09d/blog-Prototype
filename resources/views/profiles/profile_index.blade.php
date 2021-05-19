@extends('layouts.app')

@section('content')
<div class="text-6xl">
    @if (session()->has('message'))
    <h4>{{ session()->get('message')}}</h4>
    @endif
</div>
<div class="text-6xl">
    <h1>This is profile index</h1> <br>
   <div>
        <a href="{{ route('profile.create', Auth::user()->id)}}" class="bg-pink-500">Create</a>
        <a href="{{ route('profile.edit', Auth::user()->id)}}" class="bg-blue-500">Edit</a>
    </div>
</div>




@endsection