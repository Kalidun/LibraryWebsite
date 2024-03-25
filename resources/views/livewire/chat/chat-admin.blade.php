<div class=" min-h-[calc(100vh-15vh)] flex justify-between flex-col">
    <div class="flex justify-between items-center">
        <button type="button" class=" bg-teal-300 p-2 rounded-full text-white" data-drawer-hide="sidebar-chat-admin"
            aria-controls="sidebar-chat-admin">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <p class="font-bold text-xl">Admin</p>
    </div>
    @if ($chatData != null)
        <div id="chat-container" class="bg-white overflow-y-auto min-h-[calc(100vh-30vh)] max-h-[calc(100vh-30vh)] p-2"
            x-data="{ height: 0, conversationElemenet: document.getElementById('chat-container') }" x-init="height = conversationElemenet.scrollHeight;
            $nextTick(() => { conversationElemenet.scrollTop = height })"
            @scroll-bottom.window="$nextTick(() => { conversationElemenet.scrollTop = height })">
            @forelse($chatMessage as $message)
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
        <form class="w-full relative bottom-0" wire:submit.prevent="sendChatMessage">
            <div class="flex">
                <input type="text" name="message" id="message" class="w-11/12 p-1 border-b-2 bg-white rounded-xl"
                    placeholder="Message" wire:model="message">
                <button type="submit" class="w-1/12"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    @else
        <button id="chat-button" class="relative bottom-10 right-0 bg-teal-400 p-3 rounded-full text-white"
            wire:click="getChat"><i class="fa-regular fa-hand mx-1"></i>Start Chat</button>
    @endif
</div>
