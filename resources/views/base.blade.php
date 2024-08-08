<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.9.1/dist/cdn.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="bg-gray-100">
@include('layouts.header')
<div class="container mx-auto mt-5 p-4">
    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 mb-4 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-3 flex-shrink-0 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-11a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0V7zm0 6a1 1 0 1 1 2 0 1 1 0 0 1-2 0z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    @foreach($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/heroicons@latest/dist/heroicons.min.js"></script>
</div>
</body>
</html>
