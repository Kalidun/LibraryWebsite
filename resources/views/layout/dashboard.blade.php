@extends('layout.app')

@section('content')
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="flex items-center p-1 ms-3 text-sm text-black rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 z-50 top-[3.5rem] fixed z-40">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>

    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-[3.25rem] left-0 z-50 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0 shadow"
        aria-label="Sidebar">
        @include('partials.sidebar')
    </aside>

    <div class="p-2 lg:ml-64 pt-24 lg:pt-16 bg-teal-50">
        <div class="rounded-lg lg:p-4" style="min-height: 100vh;">
            @yield('section')
        </div>
    </div>
@endsection

