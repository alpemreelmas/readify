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
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold">@yield('header', 'Library Management System')</h1>
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
</body>
</html>
