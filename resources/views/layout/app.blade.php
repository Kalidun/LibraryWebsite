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
    </style>


    {{-- Tailwind Link --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-0 m-0 box-border bg-gray-100 min-h-screen min-w-screen">

    @include('partials.navbar')

    <div class="w-full">
        <div class="container-xl flex justify-center">
            @yield('content')
        </div>
    </div>

    @include('partials.footer')
</body>
{{-- Jquery Link --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</html>
