@extends('layouts.master')

@section('title', 'Waiting List')

@section('header', 'Waiting List')

@section('content')
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-600">Waiting List</h2>
        <p class="mb-8 text-lg text-gray-700">View the list of members waiting for books.</p>
        <div class="space-y-6">
            @foreach($waitingList as $entry)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">{{ $entry->book_title }}</h3>
                    <div class="gap-6">
                        <div>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>
                                    Member Email: {{ $entry->member_email }} 
                                    (Requested on: {{ \Carbon\Carbon::parse($entry->start_date)->format('F j, Y') }})
                                    <form action="{{ route('waiting-lists.destroy', $entry->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2">Cancel</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
