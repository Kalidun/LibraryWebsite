<nav class="fixed w-full z-50 top-0 bg-teal-300 p-2">
    <div class="container mx-auto flex items-center justify-between">
        <a class="flex items-center space-x-2" href="#">
            <i class="fas fa-book-atlas text-black text-3xl"></i>
            @auth
                <span class="font-semibold text-lg capitalize">{{ Auth::user()->username }}'s Library</span>
            @else
                <span class="font-semibold text-lg">Library</span>
            @endauth
        </a>
        <div class="flex gap-4 items-center">
            @auth
                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                    class="text-white bg-teal-300 hover:bg-teal-400 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-teal-300 dark:hover:bg-teal-400 dark:focus:ring-teal-500"
                    type="button">
                    <i class="fa fa-user"></i>
                </button>   
                <!-- Dropdown menu -->
                <div id="dropdownDivider"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ request()->routeIs('home') ? 'bg-gray-600 text-white' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-teal-500 transition 100 w-full hover:text-blue-700 p-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="text-black hover:bg-teal-400 w-20 text-center font-bold transition duration-100 rounded-xl p-2 {{ request()->routeIs('login') ? 'bg-teal-400 text-white' : '' }}">Login</a>
                <a href="{{ route('register') }}"
                    class="text-black hover:bg-teal-400 w-20 text-center font-bold transition duration-100 rounded-xl p-2 {{ request()->routeIs('register') ? 'bg-teal-400 text-white' : '' }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
