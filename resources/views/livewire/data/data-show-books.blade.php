<div>
    <div id="menu-section" class="mb-5 w-full flex justify-between">
        <p class="text-xl font-bold">Books</p>
        <button
            class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200"
            data-modal-target="add-book-modal" data-modal-toggle="add-book-modal">
            <i class="fa-solid fa-plus"></i>
            <span>Add</span>
        </button>
    </div>
    <div id="body" class="max-w-full">
        <div id="search-bar" class="w-full mb-5">
            <input type="text" name="search" id="search" class="border border-black p-1 rounded-xl w-1/3"
                placeholder="Search" wire:model="search" wire:input="updateSearch">
        </div>
        <table class="text-center p-1 max-w-full overflow-x-hidden sm:overflow-x-auto" id="kt_table_books">
            <tr class="bg-teal-200">
                <th>No</th>
                <th class="w-4/12">Title</th>
                <th class="w-2/12">Author</th>
                <th class="w-3/12">Category</th>
                <th class="w-1/12">Stock</th>
                <th class="w-1/12">Borrowed</th>
                <th class="w-1/12">Action</th>
            </tr>
            @forelse ($books as $book)
                <tr class="border">
                    <td>{{ $loop->iteration }}</td>
                    <td class="capitalize">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $bookStock->where('book_id', $book->id)->count() }}</td>
                    <td>{{ $bookStock->where('book_id', $book->id)->where('status_id', '2')->count() }}</td>
                    <td>
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                        <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr class="border">
                    <td colspan="7"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</td>
                </tr>
            @endforelse
        </table>
        <livewireScripts />
    </div>
</div>
