@extends('layout.dashboard')

@section('section')
    @include('pages.data.modal.modal-add-book')
    @include('pages.data.modal.modal-add-category')

    <div class="w-full">
        <div id="title">
            <p class="text-center font-bold text-3xl">Website Data</p>
        </div>
        <div id="body" class="mt-10 w-full mb-10">
            <div class="flex justify-end gap-5">
                <button data-modal-target="add-book-modal" data-modal-toggle="add-book-modal"
                    class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">Create
                    Book</button>
                <button data-modal-target="add-category-modal" data-modal-toggle="add-category-modal"
                    class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">Create
                    Category</button>
            </div>
            <div class="mt-5">
                <p class="font-bold text-xl">Category</p>
                <table class="w-full mt-5 bg-teal-200 p-2 rounded shadow-md">
                    <tr class="border-b border-black">
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Book</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($bookCategories as $category)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $books->where('category_id', $category->id)->count() }}</td>
                            <td>
                                {{-- <a href="{{ route('data.edit.category', $category->id) }}"></a>
                                <a href="{{ route('data.delete.category', $category->id) }}"></a> --}}
                                <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="mt-5">
                <p class="font-bold text-xl">Book</p>
                <table class="w-full mt-5 bg-teal-200 p-2 rounded shadow-md">
                    <tr class="border-b border-black">
                        <th>No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($books as $book)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="capitalize">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $bookStock->where('book_id', $book->id)->count() }}</td>
                            <td>
                                {{-- <a href="{{ route('data.edit.book', $book->id) }}"></a>
                                <a href="{{ route('data.delete.book', $book->id) }}"></a> --}}
                                <a href="#"><i class="fa-solid fa-eye"></i></a>
                                <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection
