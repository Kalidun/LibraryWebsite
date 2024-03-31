@extends('layout.dashboard')

@section('section')
    @include('pages.borrowed.modal.modal-return-book')
    <div class="w-full pt-2 min-h-svh">
        <div id="title" class="w-full text-center text-2xl flex justify-between pt-8 lg:pt-0">
            <a href="{{ route('borrowed.index') }}"
                class="text-black sm:hover:bg-teal-400 w-10 text-center font-bold transition duration-100 rounded-xl p-1 text-xl">
                <i class="fas fa-arrow-left"></i>
            </a>
            <p class="font-bold">{{ $bookData->book->title }}</p>
            <p class="text-sm">by : {{ $bookData->book->author }}</p>
        </div>
        <div id="body" class="mt-8 p-2">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div id="image" class="col-span-1 sm:col-span-2">
                    @if ($bookData->book->image == null)
                        <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-2/3 mx-auto h-auto rounded-xl">
                    @else
                        <img src="{{ asset('storage/images/books/' . $bookData->book->image) }}"
                            class="w-2/3 mx-auto h-auto rounded-xl">
                    @endif
                </div>
                <div id="info-group" class="flex flex-col gap-2 bg-teal-200 rounded-xl p-4 col-span-1 h-fit shadow">
                    <div id="info" class="flex justify-between">
                        <p class="font-bold text-xl w-full text-center mb-2 ">{{ $bookData->book->title }}</p>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Borrow Id</span>
                        <span>{{ $bookData->id }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Author</span>
                        <span>{{ $bookData->book->author }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Borrowed Date</span>
                        <span>{{ $bookData->created_at->diffForHumans() }}</span>
                    </div>
                    @if ($bookData->is_returned == 0 && $bookData->status_id == 4)
                        <button
                            class="bg-teal-400 p-1 rounded-xl text-white w-1/2 hover:bg-teal-300 active:bg-teal-500 transition duration-200 active:scale-90"
                            data-modal-target="return-book-modal" data-modal-toggle="return-book-modal" id="send-back-button">
                            Send Back
                        </button>
                    @elseif($bookData->is_returned == 1)
                        <div class="flex justify-center select-none">
                            <div class="text-center font-bold text-black border border-black rounded-xl p-1 w-1/2">Returned
                            </div>
                        </div>
                    @else
                        <div class="flex justify-center select-none">
                            <div class="text-center font-bold text-black border border-black rounded-xl p-1 w-1/2">Booked</div>
                        </div>
                    @endif

                </div>
                <div id="description" class="flex flex-col">
                    <p class="font-bold">Description</p>
                    <p>
                        {{ $bookData->book->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#send-back-button').on('click', function() {
                $.ajax({
                    url: "{{ route('library.return', $bookData->id) }}",
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
            })
        })
    </script>
@endsection
