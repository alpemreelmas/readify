@extends('layouts.master')

@section('title', 'Members')

@section('header', 'Members')

@section('content')
    <div class="w-3xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-600">Members List</h2>
        <a href="{{ route('members.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4 inline-block">
            Create New Member
        </a>
        <table class="w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200">First Name</th>
                    <th class="py-2 px-4 border-b border-gray-200">Last Name</th>
                    <th class="py-2 px-4 border-b border-gray-200">Email</th>
                    <th class="py-2 px-4 border-b border-gray-200">Date of Birth</th>
                    <th class="py-2 px-4 border-b border-gray-200">Address</th>
                    <th class="py-2 px-4 border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $member->first_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $member->last_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $member->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $member->date_of_birth }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $member->address }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 space-x-2" >
                            <a href="{{ route('members.show', $member->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Show
                            </a>
                            <a href="{{ route('members.edit', $member->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Edit
                            </a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
