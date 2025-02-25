@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Questions</h1>
        <form method="GET" action="{{ route('questions.index') }}" class="mb-4">
            <input type="text" name="search" placeholder="Search by keywords or location" class="form-control w-full">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>

        <div class="question-list mt-4">
            @foreach ($questions as $question)
                <div class="question-item p-4 bg-white shadow rounded mb-4">
                    <h3 class="text-xl font-bold">{{ $question->title }}</h3>
                    <p>{{ $question->content }}</p>
                    <p><strong>Location:</strong> {{ $question->location }}</p>
                    <p><small>Posted on: {{ $question->created_at->diffForHumans() }}</small></p>
                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-info">View Answer</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
