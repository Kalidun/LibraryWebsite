@extends('layout.app')

@section('content')
    <div class="flex justify-between w-full">
        <div class="bg-teal-100 w-1/6 flex flex-col justify-center items-center hidden md:flex h-fit">
            @include('partials.sidebar')
        </div>
        <div class="p-4 bg-teal-50 w-full md:w-5/6">
            @yield('ection')
        </div>
    </div>
@endsection

