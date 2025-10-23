<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supermercado</title>

    <!-- Fuentes y estilos -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-gray-100 font-inter">
    <div class="min-h-screen flex flex-col items-center justify-center px-6">
        <div class="w-full max-w-md bg-gray-800/80 backdrop-blur-md p-10 rounded-2xl shadow-2xl border border-gray-700">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
