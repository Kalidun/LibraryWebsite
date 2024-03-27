@extends('pages.data.index')

@section('data')
    {{-- @include('pages.data.modal.modal-add-book')
    @include('pages.data.modal.modal-delete-book')
    @include('pages.data.modal.modal-edit-book') --}}
    <div>
        <div id="title">
            <p class="font-bold text-xl">Book Data</p>
        </div>
        <div id="body">
            <div class="w-full flex justify-end">
                <div id="timelocal" class="w-fit p-2 bg-teal-200 rounded-xl select-none">
                    <div id="time">

                    </div>
                </div>
            </div>
            <div class="w-full mt-5 max-w-full overflow-x-auto">
                <table class="w-full">
                    <tr class="bg-teal-200 w-full">
                        <th>No</th>
                        <th class="w-1/12">Borrowed Id</th>
                        <th class="2/12">Book Title</th>
                        <th class="w-1/12">Stock Id</th>
                        <th class="w-1/12">Status</th>
                        <th class="w-2/12">Borrowed By</th>
                        <th class="w-2/12">Borrowed Date</th>
                        <th class="w-2/12">Time (GMT +8)</th>
                        <th class="w-2/12">Action</th>
                    </tr>
                    @forelse($bookingData as $book)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->book->title }}</td>
                            <td>{{ $book->stock->id }}</td>
                            <td>{{ $book->status->name }}</td>
                            <td>{{ $book->user->username }}</td>
                            <td>{{ $book->created_at->format('d-m-Y') }}</td>
                            <td>{{ $book->created_at->addHours(8)->format('H:i') }}</td>
                            <td>
                                <button id="cancelButton" class="w-full h-full bg-red-400"
                                    onclick="cancelBooking({{ $book->id }})">Cancel</button>
                            </td>
                        </tr>
                    @empty
                        <td colspan="9" class="text-center"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No
                            Data</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            const time = $('#time');
            setInterval(() => {
                time.html(new Date().toLocaleString());
            }, 1000);
        });

        function cancelBooking(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('library.cancel.ajax', '') }}/" + id,
                success: function(response) {
                    setInterval(() => {
                        window.location.reload();
                    }, 2000);
                    toastr.success("Book Successfully Cancel");
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.error);
                }
            })
        }
    </script>
@endsection
