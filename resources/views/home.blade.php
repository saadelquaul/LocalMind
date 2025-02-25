@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Welcome to Localized Question Posting</h1>
        <p>Ask questions or find answers based on your location!</p>
        <a href="{{ route('questions.index') }}" class="btn btn-primary">Browse Questions</a>
    </div>
@endsection
