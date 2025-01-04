@extends('layouts.master')

@section('title', 'Author Details')

@section('header', 'Author Details')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">{{ $author->name }}</h2>
        <div class="mb-4">
            <img src="{{ $author->picture }}" alt="{{ $author->name }}" class="w-full h-48 object-cover mb-4">
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong>Date of Birth:</strong> {{ $author->date_of_birth }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong>Date of Death:</strong> {{ $author->date_of_death }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong>Biography:</strong></p>
            <p class="text-gray-700">{{ $author->biography }}</p>
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('authors.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to Authors
            </a>
            <a href="{{ route('authors.edit', $author->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit Author
            </a>
        </div>
    </div>
@endsection
