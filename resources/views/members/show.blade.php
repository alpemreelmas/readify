@extends('layouts.master')

@section('title', 'Member Details')

@section('header', 'Member Details')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Member Details</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700">First Name:</label>
            <p class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->first_name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Last Name:</label>
            <p class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->last_name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <p class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Date of Birth:</label>
            <p class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->date_of_birth }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Address:</label>
            <p class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $member->address }}</p>
        </div>
        <div class="mb-4">
            <h3 class="text-2xl font-bold mb-4 text-blue-600">Rentals</h3>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Book</th>
                        <th class="py-2">Rented At</th>
                        <th class="py-2">Returned At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member->rentals as $rental)
                        <tr>
                            <td class="border px-4 py-2">{{ $rental->book_title }}</td>
                            <td class="border px-4 py-2">{{ $rental->rented_at }}</td>
                            <td class="border px-4 py-2">{{ $rental->returned_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            <h3 class="text-2xl font-bold mb-4 text-blue-600">Waiting List</h3>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Book</th>
                        <th class="py-2">Added At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member->waitingList as $waiting)
                        <tr>
                            <td class="border px-4 py-2">{{ $waiting->book_title }}</td>
                            <td class="border px-4 py-2">{{ $waiting->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('members.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to Members
            </a>
            <a href="{{ route('members.edit', $member->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit Member
            </a>
        </div>
    </div>
@endsection
