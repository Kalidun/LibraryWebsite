@extends('layout.dashboard')
{{-- @extends('layout.app') --}}

@section('section')
    <div class="w-full">
        <div id="title">
            <p class="text-center font-bold text-3xl">Home</p>
        </div>
        <div id="body" class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="flex flex-col border-2 p-4 bg-cyan-300 rounded-xl border-cyan-500">
                    <span class="font-bold">Total Borrowed Book</span>
                    <span>{{ $borrowedBooks -> count() }}</span>
                </div>
                <div class="flex flex-col border-2 p-4 bg-yellow-300 rounded-xl border-yellow-500">
                    <span class="font-bold">Total User in Website</span>
                    <span>{{ $totalUser }}</span>
                </div>
                <div class="flex flex-col border-2 p-4 bg-lime-300 rounded-xl border-lime-500">
                    <span class="font-bold">Total Book in Website</span>
                    <span>{{ $totalBook }}</span>
                </div>
            </div>
            <div id="info-user" class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-10">
                <div class="w-full bg-teal-50 p-4 rounded-xl border-2 border-teal-500 h-fit col-span-2">
                    <div id="title" class="flex justify-between">
                        <p class="text-center font-bold text-md">Your Borrowed Book</p>
                        <a href="#">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div id="body" class="mt-5">
                        <table class="w-full">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Return Date</th>
                            </tr>
                            @foreach ($borrowedBooks as $borrow)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="capitalize">{{ $borrow->book->title }}</td>
                                <td>{{ $borrow->book->author }}</td>                            
                                <td>{{ $borrow->return_date }}</td>
                            </tr>    
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="w-full bg-teal-200 p-4 rounded-xl border-2 border-teal-500 h-fit">
                    <div id="title">
                        <p class="text-center font-bold text-md">History Borrow</p>
                    </div>
                    <div id="body" class="mt-5">
                        <table class="w-full">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                            </tr>
                            @foreach ($borrowedBooks as $borrow)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="capitalize">{{ $borrow->book->title }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
