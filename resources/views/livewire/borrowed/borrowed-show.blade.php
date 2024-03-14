<div>
    <div id="body">
        <div id="search-bar" class="w-full mb-5">
            <input type="text" name="search" id="search" class="border border-black p-1 rounded-xl w-1/3"
                placeholder="Search" wire:model="search" wire:input="updateSearch">
        </div>
        <div id="books" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @forelse ($borrowedBooks as $borrowedBook)
            <a href="{{ route('borrowed.show', $borrowedBook->id) }}"
                class="h-fit p-4 bg-teal-100 rounded-xl flex justify-center flex-col hover:shadow-2xl hover:shadow-gray-6  shadow-xl hover:scale-105 transition duration-200 max-h-[19rem] hover:border-2 border-gray-300 shadow-gray-400">
                <div id="title" class="flex justify-between ">
                    <p class="capitalize font-bold mb-2">{{ $borrowedBook->book->title }}</p>
                </div>
                <div id="image" class="h-full flex justify-center">
                    @if ($borrowedBook->book->image == null)
                        <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-44 h-auto rounded-xl">
                    @else
                        <img src="{{ asset('storage/images/books/' . $borrowedBook->book->image) }}" class="w-44 h-auto rounded-xl">
                    @endif
                </div>
                <div id="description" class="text-center flex flex-wrap justify-between mt-3 gap-2">
                    <p>by: {{ $borrowedBook->book->author }}</p>
                    <p class="text-red-500">{{ $borrowedBook->book->return_date }}</p>
                </div>
            </a>
            @empty
                <p class="w-full text-center col-span-5"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</p>
            @endforelse
        </div>
    </div>
</div>
