<div class="h-full px-3 py-4 overflow-y-auto bg-teal-100 ">
    <ul class="space-y-2 font-medium">
        <li>
            <a href="{{ route('home') }}"
                class="flex items-center p-2 rounded-lg hover:bg-teal-300 hover:text-white group transition duration-75 {{ request()->routeIs('home') ? 'bg-teal-300 text-white' : '' }}">
                <i class="fa fa-home"></i>
                <span class="ms-3">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('library.index') }}"
                class="flex items-center p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75 {{ request()->routeIs('library.*') ? 'bg-teal-300 text-white' : '' }}">
                <i class="fa-solid fa-book"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Library</span>
            </a>
        </li>
        <li>
            <a href="{{ route('borrowed.index') }}"
                class="flex items-center p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75 {{ request()->routeIs('borrowed.*') ? 'bg-teal-300 text-white' : '' }}">
                <i class="fa-solid fa-book-bookmark"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Borrowed Books</span>
            </a>
        </li>
        <li>
            <button type="button"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group text-base hover:bg-teal-300 hover:text-white"
                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" onclick="toggleDropdown()">
                <i class="fa-solid fa-circle-plus text-black"></i>
                <span class="flex-1 ms-3 text-black text-left">All Data</span>
                <i class="fa-solid fa-chevron-down text-black transition duration-75 {{ request()->routeIs('data.*') ? 'rotate-180' : '' }}" id="dropdownButtonIcon"></i>
            </button>
            <ul id="dropdown-example" class="py-2 space-y-2 {{ request()->routeIs('data.*') ? '' : 'hidden' }} bg-teal-200 rounded-xl">
                <li>
                    <a href="{{ route('data.bookPage') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group text-base hover:bg-teal-300 hover:text-white {{ request()->routeIs('data.bookPage') || request()->routeIs('data.show.book') ? 'bg-teal-300 text-white' : '' }}">
                        <i class="fa-solid fa-book-medical"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Book
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data.catagoryPage') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group text-base hover:bg-teal-300 hover:text-white {{ request()->routeIs('data.catagoryPage') ? 'bg-teal-300 text-white' : '' }}">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Category
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data.statusPage') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group text-base hover:bg-teal-300 hover:text-white {{ request()->routeIs('data.statusPage') ? 'bg-teal-300 text-white' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Status
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data.userPage') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group text-base hover:bg-teal-300 hover:text-white {{ request()->routeIs('data.userPage') ? 'bg-teal-300 text-white' : '' }}">
                        <i class="fa-solid fa-user-group"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Users
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('profile.index') }}"
                class="flex items-center p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75 {{ request()->routeIs('profile.index') ? 'bg-teal-300 text-white' : '' }}">
                <i class="fa fa-user"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75">
                <i class="fa-solid fa-comment-dots"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">
                    Request Book
                </span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75">
                <i class="fa-solid fa-comments"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Chat</span>
            </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST" class="flex w-full">
                @csrf
                <button type="submit"
                    class="flex p-2 group rounded-lg hover:bg-teal-300 hover:text-white transition duration-75 w-full items-center">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap text-left">Logout</span>
                </button>
            </form>
        </li>
    </ul>
    <script>
        const dropdownIcon = document.getElementById('dropdownButtonIcon');
        function toggleDropdown() {
            if(dropdownIcon.classList.contains('rotate-180')) {
                dropdownIcon.classList.remove('rotate-180');
            }else {
                dropdownIcon.classList.add('rotate-180');
            }
        }
    </script>
</div>
