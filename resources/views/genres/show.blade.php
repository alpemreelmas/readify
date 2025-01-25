@extends('layouts.master')

@section('title', 'Genre Details')

@section('header', 'Genre Details')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">{{ $genre->name }}</h2>
        <div class="mb-6">
            <h3 class="text-2xl font-bold mb-4">Books in this Genre</h3>
            @if(count($books) > 0)
                <ul class="list-disc list-inside">
                    @foreach($books as $book)
                        <li class="mb-2">
                            <a href="{{ url('books/' . $book->id) }}" class="text-blue-500 hover:underline">{{ $book->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-700">No books available in this genre.</p>
            @endif
        </div>
        @if(auth()->user()?->is_admin)
        <div class="flex justify-between items-center">
            <a href="{{ url('genres/' . $genre->id . '/edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Edit Genre</a>
            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this genre?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Delete Genre</button>
            </form>
        </div>
        @endif
        <div class="mt-6">
            <a href="{{ route('genres.index') }}" class="text-blue-500 hover:underline">Back to Genres</a>
        </div>
    </div>
@endsection
