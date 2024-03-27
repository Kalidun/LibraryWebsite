@extends('layout.dashboard')

@section('section')
    @include('pages.library.modal.borrow-book')
    <div class="w-full pt-2 min-h-svh">
        <div id="title" class="w-full text-center text-2xl flex justify-between p-4 pt-8 lg:pt-0">
            <a href="{{ route('library.index') }}"
                class="text-black sm:hover:bg-teal-400 text-center font-bold transition duration-100 rounded-xl p-1 text-xl">
                <i class="fas fa-arrow-left"></i>
            </a>
            <p class="font-bold">{{ $bookData->title }}</p>
            <p class="text-sm">by : {{ $bookData->author }}</p>
        </div>
        <div id="body" class="mt-8 p-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div id="image" class="col-span-1 sm:col-span-2">
                    @if ($bookData->image == null)
                        <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-2/3 mx-auto h-auto rounded-xl">
                    @else
                        <img src="{{ asset('storage/images/books/' . $bookData->image) }}"
                            class="w-2/3 mx-auto h-auto rounded-xl">
                    @endif
                </div>
                <div id="info-group" class="flex flex-col gap-2 bg-teal-200 rounded-xl p-4 col-span-1 h-fit shadow">
                    <div id="info" class="flex justify-between">
                        <p class="font-bold text-xl w-full text-center mb-2 ">{{ $bookData->title }}</p>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Author</span>
                        <span>{{ $bookData->author }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Category</span>
                        <span>{{ $bookData->category->name }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Stock</span>
                        <span class="font-bold">{{ $bookStock->where('book_id', $bookData->id)->count() }}</span>
                    </div>
                    <div id="info" class="flex flex-col justify-start mt-5">
                        @if ($borrowedBook != null)
                        <p class="text-red-500 font-bold text-lg w-full text-center">You have already borrowed this book</p>
                        @else
                            @if ($bookingBook != null)
                                <div>
                                    <p class="text-red-500 font-bold text-lg w-full text-center">You have already booked
                                        this
                                        book</p>
                                </div>
                                <div class="w-full">
                                    <div id="info" class="flex justify-between mt-5">
                                        <span>Booking At</span>
                                        <span>{{ $bookingBook->created_at->format('d-m-Y') }}</span>
                                        <span>{{ $bookingBook->created_at->addHours(8)->format('H:i') }}</span>
                                        <input type="datetime" name="datetime" id="datetime"
                                            value="{{ $bookingBook->created_at->addHours(8)->format('Y-m-d H:i') }}"
                                            hidden>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div id="info" class="flex justify-between mt-5 w-full">
                                        <button id="borrow-button" data-modal-target="borrow-book-modal"
                                            data-modal-toggle="borrow-book-modal"
                                            class="bg-teal-400 p-2 rounded-xl text-white active:bg-teal-600 transition duration-200 active:scale-90 hover:bg-teal-500">
                                            Create QrCode
                                        </button>
                                        <div class="w-1/2 h-full flex justify-end items-center">
                                            <a href="{{ route('library.cancel', $bookingBook->id) }}" class="text-white p-2 rounded-xl bg-red-500 hover:bg-red-600 transition duration-200 active:scale-90">Cancel Booking</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($bookStock->where('book_id', $bookData->id)->count() > 0)
                                    <a href="{{ route('library.booking', $bookData->id) }}"
                                        class="bg-teal-400 p-2 rounded-xl text-white active:bg-teal-600 transition duration-200 active:scale-90 hover:bg-teal-500 w-1/2">
                                        <div class="flex items-center gap-2 ">
                                            <i class="fa-solid fa-book"></i>
                                            <span>Booking Book</span>
                                        </div>
                                    </a>
                                @else
                                    <p class="text-red-500 font-bold text-xl w-full text-center">Out of Stock</p>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
                <div id="description" class="flex flex-col">
                    <p class="font-bold">Description</p>
                    <p>
                        {{ $bookData->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @if($bookingBook != null)
    <script>
        $(document).ready(function() {
            $('#borrow-button').on('click', function() {
                $.ajax({
                    url: "{{ route('library.QrCode', $bookingBook->id) }}",
                    type: 'GET',
                    success: function(data, textStatus, xhr) {
                        if (xhr.status === 200) {
                            console.log(data);
                            $('#qr').html(data);
                        } else {
                            toastr.error(data.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            toastr.error(xhr.responseJSON.error);
                        } else {
                            toastr.error(error);
                        }
                        $('#close').click();
                    }
                });
            });
        });
    </script>
    @endif
@endsection
