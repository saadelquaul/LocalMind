@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ auth()->user()->name }}'s Profile</h1>
        <p>Email: {{ auth()->user()->email }}</p>

        <h3 class="text-xl font-bold mt-4">Your Questions:</h3>
        <ul class="list-disc list-inside">
            @foreach (auth()->user()->questions as $question)
                <li>{{ $question->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
