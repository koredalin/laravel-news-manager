<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'News Manager')</title>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite([
        'resources/css/news.css',
        'resources/js/app.js'
    ])
</head>
<body>

    <div class="container">
        @if (Route::has('login'))
            <div class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        @section('content')
            This is the master sidebar.
        @show
    </div>
    
</body>
</html>