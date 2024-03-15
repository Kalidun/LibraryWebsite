@extends('pages.data.index')

@section('data')
    @include('pages.data.modal.modal-add-book')
    <div>
        <div id="title">
            <p class="font-bold text-xl">Book Data</p>
        </div>
        <div id="body">
            <div class="w-full flex justify-end">
                <button
                    class="p-2 bg-teal-200 rounded-xl hover:bg-teal-300 active:bg-teal-400 transition duration-100 active:scale-105" data-modal-target="add-book-modal" data-modal-toggle="add-book-modal">
                    Add Book
                </button>
            </div>
            <div class="w-full mt-5">
                <table class="w-full">
                    <tr class="bg-teal-200 w-full">
                        <th>No</th>
                        <th class="w-3/12">Title</th>
                        <th class="w-3/12">Author</th>
                        <th class="w-3/12">Category</th>
                        <th class="w-1/12">Stock</th>
                        <th class="w-1/12">Borrowed</th>
                        <th class="w-1/12">Action</th>
                    </tr>
                    @forelse($dataBooks as $book)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->stocks()->where('book_id', $book->id)->count() }}</td>
                            <td>{{ $book->stocks()->where('book_id', $book->id)->where('status_id', '2')->count() }}</td>
                            <td class="text-center">
                                <a href="#"><i class="fa-solid fa-eye"></i></a>
                                <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        @empty
                            <td colspan="7" class="text-center"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
