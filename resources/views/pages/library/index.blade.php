@extends('layout.dashboard')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('section')
    <div class="w-full p-8 min-h-svh">
        <div id="title">
            <p class="text-center font-bold text-3xl">Library</p>
        </div>
        @livewire('show-book')
        {{-- button to request book via rightbar and button is fixed on right bottom --}}
        <button class="fixed bottom-10 right-10 bg-teal-400 p-3 rounded-full text-white z-[55]"
            data-drawer-target="sidebar-chat-admin" data-drawer-toggle="sidebar-chat-admin" aria-controls="sidebar-chat-admin"
            aria-expanded="false" data-drawer-placement="right">
            <i class="fa-solid fa-plus"></i>
        </button>
        <aside id="sidebar-chat-admin"
            class="fixed top-[3.25rem] right-0 z-[45] w-full lg:w-72 h-screen transition-transform translate-x-full shadow bg-teal-100 p-4">
            <div class="flex justify-between items-center">
                <button type="button" class=" bg-teal-300 p-2 rounded-full text-white"
                    data-drawer-hide="sidebar-chat-admin" aria-controls="sidebar-chat-admin">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <p class="font-bold text-xl">Request Book</p>
            </div>

        </aside>
    </div>
@endsection
