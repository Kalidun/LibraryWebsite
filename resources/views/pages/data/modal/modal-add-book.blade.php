<div id="add-book-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="add-book-modal" id="close-add-book-modal">X</button>
                <p class="text-xl font-bold">Add Book</p>
            </div>
            {{-- Content --}}
            <form class="w-full" enctype="multipart/form-data" id="kt_modal_add_book_form">
                @csrf
                <div class="p-2 w-full flex flex-col">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="rounded-xl p-1" required
                        value="{{ old('title') }}"placeholder="Title" autofocus>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="rounded-xl p-1" placeholder="Author" required
                        value="{{ old('author') }}">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="rounded-xl p-1" required>
                        <option value="" selected>Select Category</option>
                        @foreach ($bookCategories as $bookCategory)
                            <option
                                {{ old('category') == $bookCategory->id ? 'selected' : '' }}value="{{ $bookCategory->id }}">
                                {{ $bookCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="rounded-xl p-1" required placeholder="Stock"
                        value="{{ old('stock') }}" min="1">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="rounded-xl p-0" required>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="rounded-xl p-1" required placeholder="Description"
                        value="{{ old('description') }}" maxlength="255">
                </div>
                <div class="p-2 w-full">
                    <button type="submit"
                        class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Add</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <livewire:scripts />
</div>
<script>
    $(document).ready(function() {
        $("#kt_modal_add_book_form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('data.create.book') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result) {
                    $("#close-add-book-modal").click();
                    if (result.success) {
                        $('#kt_table_books').draw();
                    } else {
                        alert('Failed to add book: ' + result.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            })
        })
    })
</script>
