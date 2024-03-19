@extends('pages.data.index')

@section('data')
    @include('pages.data.modal.modal-add-book')
    @include('pages.data.modal.modal-delete-book')
    @include('pages.data.modal.modal-edit-book')
    <div>
        <div id="title">
            <p class="font-bold text-xl">Book Data</p>
        </div>
        <div id="body">
            <div class="w-full flex justify-end">
                <button
                    class="p-2 bg-teal-200 rounded-xl hover:bg-teal-300 active:bg-teal-400 transition duration-100 active:scale-105"
                    data-modal-target="add-book-modal" data-modal-toggle="add-book-modal">
                    Add Book
                </button>
            </div>
            <div class="w-full mt-5 max-w-full overflow-x-auto">
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
                                <a href="{{ route('data.show.book', $book->id) }}"><i class="fa-solid fa-eye"></i></a>
                                <button data-modal-target="edit-book-modal" data-modal-toggle="edit-book-modal" onclick="insertEditInput('{{ $book->id }}', '{{ $book->title }}', '{{ $book->author }}', '{{ $book->category->name }}', '{{ $book->stocks()->where('book_id', $book->id)->count() }}', '{{ $book->description }}')"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="text-red-500" data-modal-target="delete-book-modal"
                                    data-modal-toggle="delete-book-modal" onclick="insertToInput({{ $book->id }})"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        @empty
                            <td colspan="7" class="text-center"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No
                                Data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <script>
        const inputBookId = document.getElementById('book_id');
        function insertToInput(id) {
            inputBookId.value = id
            console.log(inputBookId.value)
        }
        function insertEditInput(bookId, bookTitle, bookAuthor, bookCategory, bookStock, bookDescription) {
            document.getElementById('edit_book_id').value = bookId
            console.log(bookId)
            document.getElementById('edit_title').value = bookTitle
            document.getElementById('edit_author').value = bookAuthor
            document.getElementById('category').value = bookCategory
            document.getElementById('edit_stock').value = bookStock
            document.getElementById('edit_description').value = bookDescription
        }
    </script>
@endsection
