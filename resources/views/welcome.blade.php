<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edelweiss</title>
    <!-- Link ke file CSS eksternal -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo mb-6">
            <img src="{{ asset('gambar/logo2.png') }}" alt="Edelweiss Logo" class="mx-auto w-32 h-auto">
        </div>
        <!-- Buttons -->
        <div class="buttons flex justify-center space-x-4 mt-4">
            <a href="{{ route('login') }}" class="btn btn-login px-6 py-2 bg-blue-600 text-white rounded-md">
                Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-register px-6 py-2 bg-green-600 text-white rounded-md">
                Register
            </a>
        </div>
    </div>
</body>
</html>
