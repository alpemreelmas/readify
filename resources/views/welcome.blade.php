@extends('layouts.master')

@section('title', 'Welcome to the Library Management System')

@section('header', 'Welcome to the Library Management System')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Welcome to the Library Management System</h2>
        <p class="mb-8 text-lg text-gray-700">Effortlessly manage your books, authors, rentals, and waiting lists.</p>
        <div class="flex justify-center space-x-6">
            <a href="{{ url('books') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Books</a>
            <a href="{{ url('authors') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Authors</a>
            <a href="{{ url('rentals') }}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Rentals</a>
            <a href="{{ url('waiting-lists') }}" class="bg-gradient-to-r from-red-500 to-red-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">View Waiting List</a>
        </div>
    </div>
@endsection

