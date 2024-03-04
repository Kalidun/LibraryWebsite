@extends('layout.app')

@section('content')
    <div class="flex justify-between w-full flex-wrap items-center" style="height: calc(100vh - 5vh);">
        <div class="w-full flex justify-center">
            @yield('section')
        </div>
    </div>
@endsection
