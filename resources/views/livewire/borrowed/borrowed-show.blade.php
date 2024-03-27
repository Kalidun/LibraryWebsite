<div>
    <div id="body" class="min-h-svh">
        <div id="search-bar" class="w-full mb-5">
            <input type="text" name="search" id="search" class="border border-black p-1 rounded-xl w-2/3 sm:w-1/3"
                placeholder="Search" wire:model="search" wire:input="updateSearch">
            <select name="category" id="select" wire:model="categories" wire:change="updateCategory"
                class="border border-black p-1 rounded-xl">
                <option value="All" selected>All</option>
                <option value="1">Returned</option>
                <option value="0">Not Returned</option>
            </select>
        </div>
        <div id="books" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @forelse ($borrowedBooks as $borrowedBook)
                <a href="{{ route('borrowed.show', $borrowedBook->id) }}"
                    class="h-fit p-4 bg-teal-100 rounded-xl flex justify-center flex-col hover:shadow-2xl hover:shadow-gray-600 shadow-xl hover:scale-105 transition duration-200 max-h-[19rem] border-gray-300 shadow-gray-400">
                    <div id="title" class="flex justify-between ">
                        @if ($borrowedBook->is_returned == 0 && $borrowedBook->status_id == 4)
                            <p class="capitalize font-bold mb-2 inline max-w-full truncate">
                                {{ $borrowedBook->book->title }}</p>
                        @elseif($borrowedBook->is_returned == 1)
                            <p class="capitalize font-bold mb-2 inline max-w-full truncate">
                                {{ $borrowedBook->book->title }} (Returned)</p>
                        @elseif($borrowedBook->status_id == 2)
                            <p class="capitalize font-bold mb-2 inline max-w-full truncate">
                                {{ $borrowedBook->book->title }} (Pending)</p>
                        @endif
                    </div>
                    <div id="image" class="h-full flex justify-center">
                        @if ($borrowedBook->book->image == null)
                            <img src="{{ asset('images/defaultPhoto.avif') }}"
                                class="w-44 h-auto rounded-xl max-h-[10rem]">
                        @else
                            <img src="{{ asset('storage/images/books/' . $borrowedBook->book->image) }}"
                                class="w-8/12 rounded-xl">
                        @endif
                    </div>
                    <div id="description" class="text-center flex flex-wrap justify-between mt-3 gap-2">
                        <p>by: {{ $borrowedBook->book->author }}</p>
                        <p class="text-red-500">{{ $borrowedBook->book->return_date }}</p>
                    </div>
                </a>
            @empty
                <p class="w-full text-center col-span-5"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data
                </p>
            @endforelse
        </div>
    </div>
</div>
