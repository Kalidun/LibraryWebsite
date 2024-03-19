<div id="edit-profil-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="edit-profil-modal" id="close-edit-profil-modal">X</button>
                <p class="text-xl font-bold">Edit Profile</p>
            </div>
            {{-- Content --}}
            <form class="w-full" method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="p-2 w-full flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ Auth::user()->username }}"
                        class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}"
                        class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $userData->name }}"
                        class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                </div>
                <div class="p-2 w-full flex gap-2">
                    <div class=" w-full flex flex-col ">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ $userData->phone }}"
                            class=" hover:bg-teal-100 transition duration-75 rounded-xl">
                    </div>
                    <div class=" w-full flex flex-col">
                        <label for="birthday">Date of Birth</label>
                        <input type="date" name="birthday" id="birthday" value="{{ $userData->birthday }}"
                            class=" hover:bg-teal-100 transition duration-75 rounded-xl">
                    </div>
                </div>
                <div class=" w-full flex flex-col p-2">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="rounded-xl p-1">
                        @if ($userData->gender_id == null)
                            <option value="" selected>Select Gender</option>
                        @endif
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}"
                                {{ $userData->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->gender }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 w-full flex flex-col">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ $userData->address }}"
                        class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                </div>
                <div class="p-2 w-full">
                    <button type="submit"
                        class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Save</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
