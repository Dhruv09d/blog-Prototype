@extends('layouts.app')

@section('content')
<div class="text-6xl">
    <h1>This is profile View</h1>
    @if (session()->has('message'))
    <h4>{{ session()->get('message')}}</h4>
    @endif
</div>




@endsection