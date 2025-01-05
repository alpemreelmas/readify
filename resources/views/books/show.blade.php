@extends('layouts.master')

@section('title', 'Book Details')

@section('header', 'Book Details')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">{{ $book->title }}</h2>
        <div class="mb-4">
            <strong>Author:</strong> {{ $book->author_name }}
        </div>
        <div class="mb-4">
            <strong>Genre:</strong> {{ $book->genre_name }}
        </div>
        <div class="mb-4">
            <strong>Published By:</strong> {{ $book->published_by }}
        </div>
        <div class="mb-4">
            <strong>Published Date:</strong> {{ $book->published_at }}
        </div>
        <div class="mb-4">
            <strong>Page Count:</strong> {{ $book->page_count }}
        </div>
        <div class="mb-4">
            <strong>Original Language:</strong> {{ $book->original_language }}
        </div>
        <div class="mb-4">
            <strong>Summary:</strong>
            <p>{{ $book->summary }}</p>
        </div>
        <div class="mb-4">
            <strong>Picture:</strong>
            <img src="{{ $book->picture }}" alt="{{ $book->title }}" class="w-full h-auto">
        </div>
        
        <div class="mb-8">
            <h3 class="text-2xl font-bold mb-4">Rentals</h3>
            @if($book->rentals)
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($book->rentals as $rental)
                        <li>
                            Rented by: {{ $rental->member_first_name }} {{ $rental->member_last_name }} 
                            (Rented at: {{ \Carbon\Carbon::parse($rental->rented_at)->format('F j, Y') }})
                            (Returned at: {{ \Carbon\Carbon::parse($rental->returned_at)->format('F j, Y') }})
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No current rentals for this book.</p>
            @endif
        </div>

        <div class="mb-8">
            <h3 class="text-2xl font-bold mb-4">Waiting List</h3>
            @if($book->waitingList)
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($book->waitingList as $entry)
                        <li>
                            <strong>{{ $entry->member_first_name }} {{ $entry->member_last_name }}</strong> Queue Position: {{ $entry->position }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No one is currently on the waiting list for this book.</p>
            @endif
            <form action="{{ route('waiting-lists.store') }}" method="POST" class="mt-4">
                <x-alert />
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" id="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add to Waiting List
                </button>
            </form>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('books.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to Books
            </a>
            <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit Book
            </a>
        </div>
    </div>
@endsection
