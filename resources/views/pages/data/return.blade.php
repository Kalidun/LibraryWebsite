@extends('pages.data.index')

@section('data')
@include('pages.data.modal.modal-check-return-book')
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
                        <th class="3/12">Book Title</th>
                        <th class="w-1/12">Stock Id</th>
                        <th class="w-1/12">Status</th>
                        <th class="w-2/12">Borrowed By</th>
                        <th class="w-1/12">Returned Date</th>
                        <th class="w-1/12">Time (GMT +8)</th>
                        <th class="w-2/12">Action</th>
                    </tr>
                    @forelse($pendingReturnedBook as $pendingBook)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $pendingBook->id }}</td>
                            <td>{{ $pendingBook->book->title }}</td>
                            <td>{{ $pendingBook->stock->id }}</td>
                            <td>{{ $pendingBook->status->name }}</td>
                            <td>{{ $pendingBook->user->username }}</td>
                            <td>{{ $pendingBook->updated_at->format('d-m-Y') }}</td>
                            <td>{{ $pendingBook->updated_at->addHours(8)->format('H:i') }}</td>
                            <td>
                                <button id="checked-button" class="w-full h-full bg-green-400" data-modal-target="modal-check-book" data-modal-toggle="modal-check-book" onclick="insertStatusToInput('{{ $pendingBook->id }}', '{{ $pendingBook->status->id }}')">Check Book</button>
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
        function insertStatusToInput(borrowedId, statusId) {
            document.getElementById('borrowed_id').value = borrowedId
            document.getElementById('status_id').value = statusId
        }
        $(document).ready(function() {
            const time = $('#time');
            setInterval(() => {
                time.html(new Date().toLocaleString());
            }, 1000);
        });
    </script>
@endsection
