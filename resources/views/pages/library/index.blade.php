@extends('layout.dashboard')

@push('style')
    @livewireStyles   
@endpush

@push('script')
    @livewireScripts
@endpush

@section('section')
<div class="w-full">
    <div id="title">
        <p class="text-center font-bold text-3xl">Library</p>
    </div>
    @livewire('show-book')    
</div>
@endsection