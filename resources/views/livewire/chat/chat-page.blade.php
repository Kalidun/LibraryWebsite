<div>
    <div class="w-full flex h-full">
        <div class="relative w-full min-h-[94vh] h-auto mt-[1.75rem] lg:mt-0 xl:mr-60 bg-teal-50">
            <div class="profil fixed top-[3.25rem] bg-teal-100 w-full p-2">
                @forelse($chatData as $chat)
                    <div class="flex gap-10 select-none">
                        <button type="button" class="hover:bg-teal-300 text-black p-1 max-h-5 rounded-full"
                            wire:click="resetChatData">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <div class="flex gap-2 items-center ">
                            @if ($chat->toUser->id == Auth::user()->id)
                                @if ($chat->user->userData->image)
                                    <img src="{{ asset('storage/images/users/' . $chat->user->userData->image) }}"
                                        class="w-7 rounded-full shadow">
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
            <div class="p-6 mt-[2.5rem]">
                @if ($chatMessage != null)
                    <div id="chat-container" x-data="{ height: 0, conversationElemenet: document.getElementById('chat-container') }" x-init="height = conversationElemenet.scrollHeight;
                    $nextTick(() => { conversationElemenet.scrollTop = height })"
                        @scroll-bottom.window="$nextTick(() => { conversationElemenet.scrollTop = height })"
                        class="bg-white overflow-y-auto min-h-[calc(100vh-27vh)] max-h-[calc(100vh-27vh)] p-2">
                        @forelse ($chatMessage as $message)
                            @if ($message->user_id == Auth::user()->id)
                                <div class="w-full flex justify-end mb-2">
                                    <div class="w-fit max-w-3/4 p-1 bg-teal-300 rounded text-black text-right flex flex-col">
                                        <div>
                                            {{ $message->message }}
                                        </div>
                                        <div class="text-xs w-full text-start">
                                        {{ $message->created_at->addHours(8)->format('H:i') }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="w-full flex justify-start mb-2">
                                    <div class="w-fit max-w-3/4 p-1 bg-teal-200 rounded text-black text-left flex flex-col">
                                        <div>
                                            {{ $message->message }}
                                        </div>
                                        <div class="text-xs w-full text-end">
                                            {{ $message->created_at->addHours(8)->format('H:i') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="w-full h-full flex justify-center items-center">Let's Start Chat</div>
                        @endforelse
                    </div>
                    <div class="fixed bottom-2 w-[90%] xl:w-[65%]">
                        <form method="POST" wire:submit.prevent="sendChatMessage" class="flex gap-4">
                            <input type="text" placeholder="Type Message"
                                class="p-1 border-b-2 bg-white rounded-xl w-11/12" name="message" wire:model="message">
                            <button type="submit" class="w-1/12"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                @endif
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
                        data-drawer-hide="sidebar-user-chat"
                        class="w-full p-2 flex items-center border-b-2 border-gray-300 bg-teal-100 hover:bg-teal-300">
                        <div class="image  rounded-full h-fit w-fit">
                            @if ($user->userData->image)
                                <img src="{{ asset('storage/images/users/' . $user->userData->image) }}"
                                    class="rounded-full shadow max-w-[2rem] max-h-[2rem]">
                            @else
                                <img src="{{ asset('images/defaultPhoto.avif') }}" class="rounded-full shadow max-w-[2rem] max-h-[2rem]">
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
