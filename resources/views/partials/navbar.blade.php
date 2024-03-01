<nav class="sticky top-0 bg-blue-400 p-2">
    <div class="container mx-auto flex items-center justify-between">
        <a class="flex items-center space-x-2" href="#">
            <i class="fas fa-book-atlas text-black text-3xl"></i>
            <span class="font-semibold text-lg capitalize">{{ Auth::user()->username }}'s Library</span>
        </a>
        <div class="flex gap-4 items-center">
            @auth
                {{-- make drop down --}}
                <div class="relative">
                    <div id="user"
                        class="rounded-full p-2 transition duration-100 ease-in hover:bg-blue-500 hover:text-white hover:cursor-pointer">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div id="dropdown" class="absolute rounded bg-gray-200 right-0 p-2 hidden">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-blue-500 transition 100 rounded hover:text-blue-700 p-2 hover:bg-gray-300">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-black hover:bg-blue-500 w-20 text-center font-bold transition duration-100 rounded-xl p-2 {{ request()->routeIs('login') ? 'bg-blue-500 text-white' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="text-black hover:bg-blue-500 w-20 text-center font-bold transition duration-100 rounded-xl p-2 {{ request()->routeIs('register') ? 'bg-blue-500 text-white' : '' }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
<script>
    const user = document.getElementById('user');
    const dropdown = document.getElementById('dropdown');
    user.addEventListener('click', () => {
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            user.classList.add('bg-blue-500', 'text-white');
        } else {
            dropdown.classList.add('hidden');
            user.classList.remove('bg-blue-500', 'text-white');
        }
    })
</script>
