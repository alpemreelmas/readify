@extends('layouts.master')

@section('title', 'Rentals Calendar')

@section('header', 'Rentals Calendar')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Rentals Calendar</h2>
        <p class="mb-8 text-lg text-gray-700">View which books are being rented and returned each day.</p>
        @if(auth()->user()?->is_admin)
            <div class="flex justify-center mb-6">
                <a href="{{ route('rentals.create') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">Add New Rental</a>
            </div>
        @endif
        <div class="space-y-6">
            @foreach($calendar as $rental)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">{{ \Carbon\Carbon::parse($rental->expected_return_date)->format('F j, Y') }}</h3>
                    <div class="gap-6">
                        <div>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>
                                    {{ $rental->book_title }} by Member ID: {{ $rental->member_id }} 
                                    (Taken on: {{ \Carbon\Carbon::parse($rental->rented_at)->format('F j, Y') }})
                                    @if(is_null($rental->returned_at))
                                        @if(auth()->user()?->is_admin)
                                            <form action="{{ route('rentals.confirmReturn', $rental->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-blue-500 hover:underline ml-2">Confirm Return</button>
                                            </form>
                                        @endif
                                    @else
                                        <span class="text-green-500 ml-2">Returned on: {{ \Carbon\Carbon::parse($rental->returned_at)->format('F j, Y') }}</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
