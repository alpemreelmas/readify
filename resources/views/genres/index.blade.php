@extends('layouts.master')

@section('title', 'Genres')

@section('header', 'Genres')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Genres Collection</h2>
        <p class="mb-8 text-lg text-gray-700">Explore our extensive list of genres.</p>
        <div class="flex justify-center mb-6">
            <a href="{{ url('genres/create') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Add New Genre</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($genres as $genre)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-2">{{ $genre->name }}</h3>
                    <div class="flex justify-between items-center">
                        <a href="{{ url('genres/' . $genre->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Details</a>
                        <a href="{{ url('genres/' . $genre->id . '/edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
