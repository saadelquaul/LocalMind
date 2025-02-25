@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="container">
        <h1>{{ auth()->user()->name }}'s Profile</h1>
        <p>Email: {{ auth()->user()->email }}</p>

        <h3>Your Questions:</h3>
        <ul>
            @foreach (auth()->user()->questions as $question)
                <li>{{ $question->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
