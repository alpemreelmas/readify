@extends('layouts.master')

@section('title', 'Edit Member')

@section('header', 'Edit Member')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Edit Member</h2>
        <x-alert />
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ $member->first_name }}" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ $member->last_name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ $member->email }}" required>
            </div>
            <div class="mb-4">
                <label for="date_of_birth" class="block text-gray-700">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ $member->date_of_birth }}">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address:</label>
                <textarea name="address" id="address" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->address }}</textarea>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('members.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Back to Members
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Member
                </button>
            </div>
        </form>
    </div>
@endsection
