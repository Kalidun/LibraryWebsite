<div>
    <div class="w-full flex h-full">
        <div class="relative w-full min-h-[94vh] h-auto mt-[1.75rem] lg:mt-0 xl:mr-60 bg-teal-50">
            <div class="profil fixed top-[3.25rem] bg-teal-100 w-full p-2">
                @forelse($chatData as $chat)
                    <div class="flex gap-10 select-none">
                        <button type="button" class="hover:bg-teal-300 text-black p-2 rounded-full"
                            wire:click="resetChatData">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <div class="flex gap-2 items-center ">
                            {{-- {{ dd($chat->toUser->id) }} --}}
                            @if ($chat->toUser->id == Auth::user()->id)
                                @if ($chat->user->userData->image)
                                    <img src="{{ asset('storage/images/users/' . $chat->user->userData->image) }}"
                                        class="w-10 rounded-full shadow">
                                @else
                                    <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-10 rounded-full shadow">
                                @endif
                                <div class="font-bold">{{ $chat->user->username }}</div>
                            @else
                                @if ($chat->toUser->userData->image)
                                    <img src="{{ asset('storage/images/users/' . $chat->toUser->userData->image) }}"
                                        class="w-10 rounded-full shadow">
                                @else
                                    <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-10 rounded-full shadow">
                                @endif
                                <div class="font-bold">{{ $chat->toUser->username }}</div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="ml-2">
                        Chat User
                    </div>
                @endforelse
            </div>
            <div 
            x-init="window.scrollTo(0,document.body.scrollHeight)"
            class="p-6 mt-[2.5rem] h-full">
                @forelse($chatMessage as $message)
                    {{-- <div>{{ $message->message }}</div> --}}
                    @if ($message->user_id == Auth::user()->id)
                        <div class="w-full flex justify-end mb-2">
                            <div class="w-3/4 p-2 bg-teal-300 rounded-3xl text-black text-right flex flex-col">
                                <div>
                                    {{ $message->message }}
                                </div>
                                <span class="text-xs">
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div>
                            </div>
                        </div>
                    @else
                        <div class="w-full flex justify-start mb-2">
                            <div class="w-3/4 p-2 bg-teal-200 rounded-3xl text-black text-left flex flex-col">
                                <div>
                                    {{ $message->message }}
                                </div>
                                <span class="text-xs">
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    @endif
                    <div class="fixed bottom-2 w-[95%] xl:w-[65%]">
                        <form method="POST" wire:submit.prevent="sendChatMessage" class="flex gap-4">
                            <input type="text" placeholder="Type Message"
                                class="w-full p-1 border-b-2 bg-white rounded-xl" name="message" wire:model="message">
                            <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                @empty
                    @if ($chatData == null)
                        <p class="w-full text-center col-span-5"><i class="fa-solid fa-circle-info mx-1"></i>Chat Page
                        </p>
                    @else
                        <p class="w-full text-center col-span-5"><i class="fa-regular fa-hand mx-1"></i>Chat User</p>
                        <div class="fixed bottom-2 w-[95%] xl:w-[65%]">
                            <form method="POST" wire:submit.prevent="sendChatMessage" class="flex gap-4">
                                <input type="text" placeholder="Type Message"
                                    class="w-full p-1 border-b-2 bg-white rounded-xl" name="message"
                                    wire:model="message">
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </div>
                    @endif
                @endforelse
            </div>
        </div>
        <aside id="sidebar-user-chat"
            class="fixed top-[3.25rem] right-0 z-[45] w-52 lg:w-60 h-screen transition-transform translate-x-full xl:translate-x-0 shadow bg-teal-100">
            <div id="search" class="w-full p-2">
                <input type="text" placeholder="Search" class="w-full p-1 border-b-2 bg-white rounded-xl"
                    wire:model="search" wire:input="updateSearch">
            </div>
            <div class="overflow-y-scroll h-full pb-10">
                @forelse ($userData as $user)
                    <button id="contact" wire:click="getChat({{ $user->id }})"
                        class="w-full p-2 flex items-center border-b-2 border-gray-300 bg-teal-100 hover:bg-teal-300">
                        <div class="image  w-1/5">
                            @if ($user->userData->image)
                                <img src="{{ asset('storage/images/users/' . $user->userData->image) }}"
                                    class="rounded-full shadow">
                            @else
                                <img src="{{ asset('images/defaultPhoto.avif') }}" class="rounded-full shadow">
                            @endif
                        </div>
                        <div class="ml-2">
                            <div class="name text-lg font-semibold">
                                {{ $user->username }}
                                {{ $user->id }}
                            </div>
                            <div class="chat text-xs ">
                            </div>
                        </div>
                    </button>
                @empty
                    <p class="w-full text-center col-span-5"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No
                        Data</p>
                @endforelse
            </div>
        </aside>
    </div>
</div>
