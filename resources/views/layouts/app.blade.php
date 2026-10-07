<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    @auth
        @include('layouts.partials.header')
    @endauth

    <main class="mx-auto w-full max-w-5xl flex-1 px-4 py-10">
        @yield('content')
    </main>

    @auth
        @include('layouts.partials.footer') 
    @endauth
</body>
</html>