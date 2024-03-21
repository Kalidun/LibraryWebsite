@extends('layout.app')

@section('content')
    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-[3.25rem] left-0 z-50 w-64 h-full transition-transform -translate-x-full lg:translate-x-0 shadow"
        aria-label="Sidebar">
        @include('partials.sidebar')
    </aside>

    <div class="lg:ml-64 pt-6 lg:pt-12 bg-teal-50">
        <div class="rounded-lg h-fit">
            @yield('section')
        </div>
    </div>
@endsection

