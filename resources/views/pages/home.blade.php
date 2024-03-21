@extends('layout.dashboard')
{{-- @extends('layout.app') --}}

@section('section')
    <div class="w-full p-8">
        <div id="title">
            <p class="text-center font-bold text-3xl">Home</p>
        </div>
        <div id="body" class="mt-10">


            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="font-bold text-xl">Recent Books</div>
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($bookRecentImgs as $bookRecentImg)
                        <div class="hidden duration-700 ease-in-out max-w-full" data-carousel-item>
                            <img src="{{ asset('storage/images/books/' . $bookRecentImg->image) }}"
                                class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 p-10">
                            <div id="title-book">
                                <p class="capitalize font-bold mb-2 text-center">{{ $bookRecentImg->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    @foreach ($bookRecentImgs as $key => $bookRecentImg)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $key + 1 }}"
                            data-carousel-slide-to="{{ $key }}"></button>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="flex flex-col border-2 p-4 bg-cyan-300 rounded-xl border-cyan-500">
                    <span class="font-bold">Total Borrowed Book</span>
                    <span>{{ $borrowedBooks->count() }}</span>
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
