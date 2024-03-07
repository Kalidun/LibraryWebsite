<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    @livewireStyles
    {{-- FlowBite Link --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    {{-- Tailwind Link --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-0 m-0 bg-teal-50 min-w-screen h-fit" style="min-height: 100vh;">

    @include('partials.navbar')
    @include('partials.toast')
    @yield('content')

    @include('partials.footer')

    @livewireScripts
</body>
{{-- Jquery Link --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- Flowbite JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>
