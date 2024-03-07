<div id="body" class="mt-10">
    <div class="seach-bar w-full flex justify-center gap-5">
        <select name="#" id="category" class="border border-black p-1 rounded-xl w-1/4" wire:model="categories" wire:change="updateCategory">
            <option value="All" selected>All</option>
            @foreach ($bookCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" name="#" id="search" class="border border-black p-1 rounded-xl w-1/3" placeholder="Search" wire:model="search" wire:input="updateSearch">
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 mt-5">
        @foreach($books as $book)
        <a href="{{ route('library.show', $book->id) }}" class="h-fit p-4 bg-teal-100 rounded-xl flex justify-center flex-col hover:shadow-2xl shadow-xl hover:scale-105 transition duration-200 max-h-[18rem]">
            <div id="title">
                <p class="capitalize font-bold mb-2">{{ $book->title }}</p>
            </div>
            <div id="image" class="h-full flex justify-center">
                @if($book->image == null)
                <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-44 h-auto rounded-xl">
                @else
                <img src="{{ asset('storage/images/books/' . $book->image) }}" class="w-44 h-auto rounded-xl">
                @endif
            </div>
            <div id="description" class="text-center flex flex-wrap justify-between mt-3 gap-2">
                <p>{{ $book->category->name }}</p>
                <p>by: {{ $book->author }}</p>
            </div>
        </a>
        @endforeach
        @if($books->count() == 0)
            <p class="text-center">No Book Found</p>
        @endif
    </div>
</div>
