@extends('layouts.master')

@section('title', 'Books')

@section('header', 'Books')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Books Collection</h2>
        <p class="mb-8 text-lg text-gray-700">Explore our extensive collection of books available for rental.</p>
        @if(auth()->user()?->is_admin)
        <div class="flex justify-center mb-6">
                <a href="{{ route('books.create') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Add New Book</a>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($books as $book)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-2">{{ $book->title }}</h3>
                    <p class="text-gray-700 mb-4">by {{ $book->author_name }}</p>
                    <p class="text-gray-700 mb-4">{{ $book->summary }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('books.show', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Details</a>
                        @if(auth()->user()?->is_admin)
                            <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Edit</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
