<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CRUD Management') }}</title>
        <!-- Ganti style.css dengan crud-style.css -->
        <link rel="stylesheet" href="{{ asset('css/crud-style.css') }}">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 flex flex-col min-h-screen">
        <div class="flex-1">
            <!-- Navigasi menggunakan Livewire -->
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow mb-6">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer-contact">
            <p>&copy; 2024 Toko Roti Edelweiss</p>
        </footer>
    </body>
</html>
