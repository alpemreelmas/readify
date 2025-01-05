@extends('layouts.master')

@section('title', 'Edit Genre')

@section('header', 'Edit Genre')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Edit Genre</h2>
        <x-alert />
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Genre Name:</label>
                <input type="text" name="name" id="name" value="{{ $genre->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Genre
                </button>
                <a href="{{ route('genres.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
