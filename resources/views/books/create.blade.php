@extends('layouts.master')

@section('title', 'Add New Book')

@section('header', 'Add New Book')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Add a New Book</h2>
        <x-alert />
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
                <label for="picture" class="block text-gray-700 font-bold mb-2">Picture URL:</label>
                <input type="text" name="picture" id="picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="summary" class="block text-gray-700 font-bold mb-2">Summary:</label>
                <textarea name="summary" id="summary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label for="page_count" class="block text-gray-700 font-bold mb-2">Page Count:</label>
                <input type="number" name="page_count" id="page_count" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="original_language" class="block text-gray-700 font-bold mb-2">Original Language:</label>
                <input type="text" name="original_language" id="original_language" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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
                <label for="published_by" class="block text-gray-700 font-bold mb-2">Published By:</label>
                <input type="text" name="published_by" id="published_by" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="Unknown">
            </div>
            <div class="mb-4">
                <label for="published_at" class="block text-gray-700 font-bold mb-2">Published Date:</label>
                <input type="date" name="published_at" id="published_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
