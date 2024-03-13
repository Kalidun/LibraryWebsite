@extends('layout.dashboard')

@section('section')
    <div class="w-full">
        <div id="title">
            <p class="text-center font-bold text-3xl">Borrowed Books</p>
        </div>
        <div id="body" class="mt-5">
            @livewire('Borrowed.borrowed-show')
        </div>
    </div>
@endsection