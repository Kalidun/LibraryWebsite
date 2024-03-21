<?php

namespace App\Livewire\Chat;

use App\Models\ChatMessage;
use App\Models\User;
use Livewire\Component;
use App\Models\chat\Chat;

class ChatPage extends Component
{
    public $authId;
    public $toUserId;
    public $search;
    public $chat = [];
    public $chatMessage = [];
    public $message = '';
    public function render()
    {
        $this->getAuthId();
        $userData = User::whereNotIn('id', [auth()->user()->id])->with('chat');
        if ($this->search) {
            $userData = $userData->where('username', 'like', '%' . $this->search . '%');
        }
        $userData = $userData->get();
        return view('livewire.chat.chat-page', [
            'userData' => $userData,
            'chatData' => $this->chat,
            'chatMessage' => $this->chatMessage
        ]);
    }
    public function updateSearch()
    {
        $this->search;
    }
    public function getAuthId()
    {
        $this->authId = auth()->user()->id;
    }
    public function resetChatData()
    {
        $this->chat = [];
    }
    public function getChatMessage($id){
        $chatMessage = ChatMessage::where('chat_id', $id)->get();
        if($chatMessage != null){
            $this->chatMessage = $chatMessage;
        }else{
            $this->chatMessage = collect([]);
        }
    }
    public function getChat($id)
    {
        $existingChat = Chat::where(function ($query) use ($id) {
            $query->where('user_id', $this->authId)
                ->where('to_user_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->where('to_user_id', $this->authId);
        })->get();

        if ($existingChat->count() > 0) {
            if($existingChat[0]->user_id == $this->authId){
                $this->toUserId = $existingChat[0]->to_user_id;
            } else{
                $this->toUserId = $existingChat[0]->user_id;
            }
            $this->chat = $existingChat;
            $this->getChatMessage($existingChat[0]->id);
        } else {
            $createdChat = Chat::create([
                'user_id' => $this->authId,
                'to_user_id' => $id,
                'status_id' => 1
            ]);
            $this->toUserId = $id;
            $this->chat = collect([$createdChat]);
        }
    }
    public function sendChatMessage(){
        $this->validate([
            'message' => 'required'
        ]);
        ChatMessage::create([
            'user_id' => $this->authId,
            'to_user_id' => $this->toUserId,
            'message' => $this->message,
            'chat_id' => $this->chat[0]->id,
            'status_id' => 1,
            'date_sent' => now()
        ]);
        $this->message = '';
        $this->chatMessage = collect([]);
        $this->getChatMessage($this->chat[0]->id);
    }
}
