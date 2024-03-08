<div id="borrow-book-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="borrow-book-modal">X</button>
                <p class="text-xl font-bold">Borrow Book</p>
            </div>
            {{-- Content --}}
            <form action="{{ route('library.borrow') }}" class="w-full" enctype="multipart/form-data" method="POST"> 
                @csrf
                <div class="p-2 w-full flex flex-col">
                    <label for="book_id">Book ID</label>
                    <input type="number" name="book_id" id="book_id" class="rounded-xl p-1" required value="{{ $bookData->id }}" readonly>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="return_date">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="rounded-xl p-1" required value="{{ old('return_date') }}" autofocus>
                </div>
                <div class="p-2 w-full">
                    <button type="submit" class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Add</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>