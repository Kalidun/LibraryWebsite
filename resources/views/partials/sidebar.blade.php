<div class="w-full">
    <div id="menu" class="p-2 hover:cursor-pointer flex flex-col gap-4">
        <div id="header" class="text-xl mb-2 flex flex-col justify-center items-center h-fit p-2">
            <i class="fa-solid fa-book-open-reader text-3xl"></i>
            <span>Menu</span>
        </div>
        <div id="menu-body" class="flex flex-col gap-1 h-fit">
            <a id="menu-items"
                class="flex w-full p-2 items-center gap-2 text-sm rounded hover:bg-blue-500 hover:text-white {{ request()->routeIs('home') ? 'bg-blue-500 text-white' : '' }}"
                href="{{ route('home') }}">
                <i class="fa fa-home"></i>
                <span class="text-base">Home</span>
            </a>
            <a id="menu-items"
                class="flex w-full p-2 items-center gap-2 text-sm rounded hover:bg-blue-500 hover:text-white"    
                href="{{ route('home') }}">
                <i class="fa fa-home"></i>
                <span class="text-base">Library</span>
            </a>
            <a id="menu-items"
                class="flex w-full p-2 items-center gap-2 text-sm rounded hover:bg-blue-500 hover:text-white"
                href="{{ route('home') }}">
                <i class="fa fa-home"></i>
                <span class="text-base">Borrowed Books</span>
            </a>
            <a id="menu-items"
                class="flex w-full p-2 items-center gap-2 text-sm rounded hover:bg-blue-500 hover:text-white"
                href="{{ route('home') }}">
                <i class="fa fa-home"></i>
                <span class="text-base">Profile</span>
            </a>
        </div>
    </div>
</div>
