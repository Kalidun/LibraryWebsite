@extends('layout.dashboard')

@section('section')
    <div class="w-full pt-8 sm:p-8">
        <div id="title">
            <p class="font-bold text-3xl">Return</p>
        </div>
        <div id="body" class="mt-5 grid grid-cols-1 lg:grid-cols-2 min-h-[80vh] sm:h-fit gap-4 p-2">
            <div class="w-full flex justify-center h-fit p-4 bg-white shadow">
                @if ($borrowedData->book->image == null)
                    <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-2/3">
                @else
                    <img src="{{ asset('storage/images/books/' . $borrowedData->book->image) }}" class="w-2/3">
                @endif
            </div>
            <div class="w-full bg-white shadow p-10 justify-self-start lg:justify-self-end h-fit">
                <div id="message">

                </div>
                <div class="w-full">
                    <div class="font-bold text-2xl">Book Title</div>
                </div>
                <form action="#" id="return-book-form">
                    @csrf
                    <input type="text" id="borrowed_id" name="borrowed_id" value="{{ $borrowedData->id }}" hidden>
                    <div class="p-2 w-full flex flex-col">
                        <select name="status_id" id="status_id" class="w-full rounded-xl">
                            @forelse($dataStatus as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @empty
                                <option value="#">No Data</option>
                            @endforelse
                        </select>
                    </div>
                    <button
                        class="p-2 bg-teal-200 rounded-xl text-white w-fit hover:bg-teal-300 active:bg-teal-500 transition duration-200 active:scale-90">Send
                        Data</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#return-book-form').submit(function(e) {
                e.preventDefault();
                let data = $(this).serialize();

                $.ajax({
                    url: "{{ route('library.confirmed') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#message').html(
                            '<div class="text-green-600 font-bold">Data sent successfully!</div>'
                            );
                        $('#return-book-form').find('button[type="submit"]').hide();
                        $('#return-book-form').find('input, select').prop('readonly', true);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseJSON.error);
                        toastr.error(xhr.responseJSON.error);
                    }
                });
            });
        });
    </script>
@endsection
