<nav class="sticky top-0 bg-gray-200 p-2 mb-12">
    <div class="container mx-auto flex items-center justify-between">
        <a class="flex items-center space-x-2" href="#">
            <i class="fas fa-book-atlas text-blue-500"></i>
            <span class="font-semibold text-lg">Khalid's Library</span>
        </a>
        <div class="flex gap-4 items-center">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 p-2">Login</a>
                <a href="#" class="text-blue-500 hover:text-blue-700 p-2">Register</a>
            @else
                <div id="user"
                    class="rounded-full p-2 transition duration-100 ease-in hover:bg-blue-500 hover:text-white hover:cursor-pointer">
                    <i class="fas fa-user"></i>
                </div>
            @endif
        </div>
    </div>
</nav>
