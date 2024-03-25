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
            <i class="fa-solid fa-headset"></i>
        </button>
        <aside id="sidebar-chat-admin"
            class="fixed top-[3.25rem] right-0 z-[60] w-full lg:w-96 h-screen transition-transform translate-x-full shadow bg-teal-100 p-4">
            @livewire('chat.chat-admin')
        </aside>
    </div>
@endsection
