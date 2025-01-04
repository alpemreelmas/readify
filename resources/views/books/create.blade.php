@extends('layouts.master')

@section('title', 'Add New Book')

@section('header', 'Add New Book')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Add a New Book</h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="author_id" class="block text-gray-700 font-bold mb-2">Author:</label>
                <select name="author_id" id="author_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @if(count($authors) > 0)
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    @else
                        <option disabled>There are no authors</option>
                    @endif
                </select>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label for="genre_id" class="block text-gray-700 font-bold mb-2">Genre:</label>
                <select name="genre_id" id="genre_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @if(count($genres) > 0)
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    @else
                        <option disabled>There are no genres</option>
                    @endif
                </select>
            </div>
            <div class="mb-4">
                <label for="published_date" class="block text-gray-700 font-bold mb-2">Published Date:</label>
                <input type="date" name="published_date" id="published_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add Book
                </button>
                <a href="{{ route('books.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
