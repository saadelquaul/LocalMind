@extends('layouts.app')

@section('title', 'Ask a Question')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Ask a Question</h1>
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="form-control w-full mt-1" placeholder="Enter a descriptive title" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" id="content" class="form-control w-full mt-1" rows="5" placeholder="Enter detailed content" required></textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="form-control w-full mt-1" placeholder="Enter the location" required>
            </div>
            <div class="mb-4">
                <label for="publication_date" class="block text-gray-700">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control w-full mt-1" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
