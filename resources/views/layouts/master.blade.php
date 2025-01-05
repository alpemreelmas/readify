<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex items-center justify-start space-x-8">
                <h1 class="text-2xl font-bold">@yield('header', 'Library Management System')</h1>
                <nav class="flex-nowrap mr-4">
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                        <li><a href="{{ route('books.index') }}" class="hover:underline">Book List</a></li>
                        <li><a href="{{ route('members.index') }}" class="hover:underline">Member List</a></li>
                        <li><a href="{{ route('rentals.index') }}" class="hover:underline">Rental List (Calendar)</a></li>
                        <li><a href="{{ route('waiting-lists.index') }}" class="hover:underline">Waiting List</a></li>
                        <li><a href="{{ route('genres.index') }}" class="hover:underline">Genre List</a></li>
                        <li><a href="{{ route('authors.index') }}" class="hover:underline">Author List</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="flex-grow container mx-auto p-4">
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white p-4">
            <div class="container mx-auto text-center">
                &copy; {{ date('Y') }} Library Management System. All rights reserved.
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
