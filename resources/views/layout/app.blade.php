<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Library Management System for help reading and borrowing books">
    <title>{{ config('app.name') }}</title>
    {{-- Font Awesome Link --}}
    <script src="https://kit.fontawesome.com/f9dc9fae33.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap');

        body {
            font-family: 'Quicksand', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="stylesheet" href="{{ asset('css/app-dccd3223.css') }}">
    <script src="{{ asset('js/app-794b5d55.js') }}"></script> --}}

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"> --}}
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body class="p-0 m-0 bg-teal-50 min-w-screen h-fit" style="min-height: 100vh;">

    @include('partials.toast')
    @include('partials.navbar')
    @yield('content')

    @if (Request::routeIs('chat.index'))

    @else
        @include('partials.footer')
    @endif
        @livewireScripts
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
</body>

</html>
