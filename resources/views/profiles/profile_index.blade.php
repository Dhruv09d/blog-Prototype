@extends('layouts.app')

@section('content')
<div class="text-6xl">
    <h1>This is profile index</h1>

    <form action="{{ route('profile.create', Auth::user()->id)}}" method="POST">
        @csrf
        <input type="submit"  value="Create">
    </form>
    
</div>




@endsection