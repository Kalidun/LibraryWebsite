@extends('layout.app')

@section('content')
    <div class="flex justify-between w-full">
        <div class="bg-blue-300 w-1/6 flex flex-col justify-center items-center hidden md:flex h-fit">
            @include('partials.sidebar')
        </div>
        <div class="p-4 bg-blue-100 w-full md:w-5/6">
            @yield('section')
        </div>
    </div>
@endsection

