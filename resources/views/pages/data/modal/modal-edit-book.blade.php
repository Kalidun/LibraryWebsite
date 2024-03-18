<div id="edit-book-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="edit-book-modal" id="close-edit-book-modal">X</button>
                <p class="text-xl font-bold">Edit Book</p>
            </div>
            {{-- Content --}}
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Just ignore the input if it doesn't need to be edited.</span>
                </div>
            </div>
            <form class="w-full" action="{{ route('data.update.book') }}" enctype="multipart/form-data" id="kt_modal_edit_book_form"
                method="POST">
                @csrf
                <input type="text" name="book_id" id="edit_book_id" hidden>
                <div class="p-2 w-full flex flex-col">
                    <label for="title">Title</label>
                    <input type="text" name="book_title" id="edit_title" class="rounded-xl p-1" required
                        value="{{ old('title') }}"placeholder="Title" autofocus>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="author">Author</label>
                    <input type="text" name="book_author" id="edit_author" class="rounded-xl p-1"
                        placeholder="Author" required value="{{ old('author') }}">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="category">Category</label>
                    <select name="book_category" id="category" class="rounded-xl p-1">
                        <option value="" selected>Select Category</option>
                        @foreach ($dataCategory as $bookCategory)
                            <option {{ old('category') == $bookCategory->id ? 'selected' : '' }}
                                value="{{ $bookCategory->id }}">
                                {{ $bookCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="stock">Stock</label>
                    <input type="number" name="book_stock" id="edit_stock" class="rounded-xl p-1" required
                        placeholder="Stock" value="{{ old('stock') }}" min="1">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="image">Image</label>
                    <input type="file" name="book_image" id="image" class="rounded-xl p-0">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="description">Description</label>
                    <input type="text" name="book_description" id="edit_description" class="rounded-xl p-1" required
                        placeholder="Description" value="{{ old('description') }}" maxlength="255">
                </div>
                <div class="p-2 w-full">
                    <button type="submit"
                        class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Save</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
