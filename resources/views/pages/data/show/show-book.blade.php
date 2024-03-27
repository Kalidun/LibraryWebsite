@extends('layout.dashboard')

@section('section')
    @include('pages.data.modal.modal-edit-stock-book')
    <style>
        tr:hover {
            background-color: #7aecdb;
        }

        tr,
        th,
        td {
            border: 1px solid black;
        }

        th {
            background-color: #7aecdb;
        }
    </style>
    <div class="w-full p-8">
        <div id="title" class="w-full text-center text-2xl flex justify-between">
            <a href="{{ route('data.bookPage') }}"
                class="text-black hover:bg-teal-400 w-10 text-center font-bold transition duration-100 rounded-xl p-1 text-xl">
                <i class="fas fa-arrow-left"></i>
            </a>
            <p class="font-bold">{{ $dataBook->title }}</p>
            <p class="text-sm">by : {{ $dataBook->author }}</p>
        </div>
        <div id="body" class="mt-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div id="image" class="col-span-1 sm:col-span-2">
                    @if ($dataBook->image == null)
                        <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-2/3 mx-auto h-auto rounded-xl">
                    @else
                        <img src="{{ asset('storage/images/books/' . $dataBook->image) }}"
                            class="w-2/3 mx-auto h-auto rounded-xl">
                    @endif
                </div>
                <div id="info-group"
                    class="flex flex-col gap-2 bg-teal-200 rounded-xl p-4 col-span-1 h-fit shadow w-4/5 sm:w-full justify-self-center mb-4">
                    <div id="info" class="flex justify-between">
                        <p class="font-bold text-xl w-full text-center mb-2 ">{{ $dataBook->title }}</p>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Author</span>
                        <span>{{ $dataBook->author }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Title</span>
                        <span>{{ $dataBook->title }}</span>
                    </div>
                    <div id="info" class="flex justify-between">
                        <span>Category</span>
                        <span>{{ $dataBook->category->name }}</span>
                    </div>
                </div>
            </div>
            <div id="description" class="flex flex-col w-full mb-4">
                <p class="font-bold">Description</p>
                <p>
                    {{ $dataBook->description }}
                </p>
            </div>
            <div id="table" class="overflow-x-auto">
                <table class="w-full">
                    <tr>
                        <th>No</th>
                        <th>Stock Id</th>
                        <th>Status</th>
                        <th>Borrowed By</th>
                        <th>Borrowed Since</th>
                        <th>Borrowed Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                    @forelse($bookStocks as $bookStock)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bookStock->id }}</td>
                            <td>{{ $bookStock->status->name }}</td>
                            @if ($borrowedBook->contains('stock_id', $bookStock->id))
                                <td>{{ $borrowedBook->where('stock_id', $bookStock->id)->first()->user->username }}</td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($borrowedBook->contains('stock_id', $bookStock->id))
                                <td>{{ $borrowedBook->where('stock_id', $bookStock->id)->first()->created_at->diffForHumans() }}
                                </td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($borrowedBook->contains('stock_id', $bookStock->id))
                                <td>{{ $borrowedBook->where('stock_id', $bookStock->id)->first()->return_date }}</td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($borrowedBook->contains('stock_id', $bookStock->id))
                                <td>{{ $borrowedBook->where('stock_id', $bookStock->id)->first()->return_date }}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td class="text-center">
                                <button id="edit-button" data-modal-target="edit-stock-book"
                                    data-modal-toggle="edit-stock-book" onclick="sendDataToModal('{{ $bookStock->id }}', '{{ $bookStock->status->id }}')">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr colspan="6" class="text-center">
                            <i class="fa-solid fa-triangle-exclamation mx-1"></i>
                            No Data
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <script>
        const inputStockId = document.getElementById('stock_id');
        const inputStatusId = document.getElementById('status_id');
        function sendDataToModal(id, name) {
            inputStockId.value = id
            inputStatusId.value = name
        }

        $(document).ready(function () {
            $('#edit-status-form').submit(function (event) {
                event.preventDefault();
                let data = $(this).serialize();

                $.ajax({
                    url: "{{ route('data.update.stock') }}",
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        toastr.error(xhr.responseJSON.error);
                    }
                })
            })
        })
    </script>
@endsection
