@extends('layouts.master')

@section('title', 'Create Rental')

@section('header', 'Create Rental')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Create New Rental</h2>
        <x-alert />
        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="book_id" class="block text-gray-700">Book ID:</label>
                <select name="book_id" id="book_id" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="member_id" class="block text-gray-700">Member ID:</label>
                <select name="member_id" id="member_id" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->first_name }} {{ $member->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="rented_at" class="block text-gray-700">Rented At:</label>
                <input type="date" name="rented_at" id="rented_at" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="duration_of_rent" class="block text-gray-700">Duration of Rent (days):</label>
                <input type="number" name="duration_of_rent" id="duration_of_rent" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="returned_at" class="block text-gray-700">Returned At:</label>
                <input type="date" name="returned_at" id="returned_at" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('rentals.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Back to Rentals
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Rental
                </button>
            </div>
        </form>
    </div>
@endsection
