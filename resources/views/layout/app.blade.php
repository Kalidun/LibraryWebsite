<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap');
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>

    {{-- Font Awesome Link --}}
    <script src="https://kit.fontawesome.com/f9dc9fae33.js" crossorigin="anonymous"></script>

    {{-- Tailwind Link --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-0 m-0 box-border bg-gray-100 min-h-screen min-w-screen">

    @include('partials.navbar')

    <div class=" flex justify-center">
        <div class="container flex justify-center">
            @yield('content')
        </div>
    </div>

    <footer class="relative bottom-0 w-full max-h-16">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,160L34.3,160C68.6,160,137,160,206,176C274.3,192,343,224,411,234.7C480,245,549,235,617,240C685.7,245,754,267,823,250.7C891.4,235,960,181,1029,176C1097.1,171,1166,213,1234,229.3C1302.9,245,1371,235,1406,229.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </footer>
</body>
{{-- Jquery Link --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</html>
