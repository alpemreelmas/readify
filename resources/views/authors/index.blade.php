@extends('layouts.master')

@section('title', 'Authors')

@section('header', 'Authors')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Authors Collection</h2>
        <p class="mb-8 text-lg text-gray-700">Explore our extensive list of authors.</p>
        <div class="flex justify-center mb-6">
            <a href="{{ url('authors/create') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Add New Author</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($authors as $author)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-2">{{ $author->name }}</h3>
                    <img src="{{ $author->picture }}" alt="{{ $author->name }}" class="w-full h-48 object-cover mb-4">
                    <p class="text-gray-700 mb-4">{{ Str::limit($author->biography, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ url('authors/' . $author->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Details</a>
                        <a href="{{ url('authors/' . $author->id . '/edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Edit</a>
                        <form action="{{ url('authors/' . $author->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
