<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\chat\Chat;
use App\Models\ChatMessage;
use App\Notifications\MessageSent;

class ChatAdmin extends Component
{
    public $chatData = [];
    public $chatMessage = [];
    public $UserId;
    public $message = '';

    public function getListeners()
    {
        $authId = auth()->user()->id;
        return [
            "echo-private:users.{$authId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcestedNotification'
        ];
    }
    public function broadcestedNotification($notification)
    {
        if ($this->chatData != null) {
            if ($notification['chat_id'] == $this->chatData[0]->id) {
                $this->getMessages();
            }
        }
    }

    public function render()
    {
        $this->getUserId();
        return view('livewire.chat.chat-admin', [
            'chatData' => $this->chatData,
            'messages' => $this->chatMessage
        ]);
    }
    public function getChat()
    {
        $existingChat = Chat::where(function ($query) {
            $query->where('user_id', $this->UserId)
                ->where('to_user_id', 1);
        })->orWhere(function ($query) {
            $query->where('user_id', 1)
                ->where('to_user_id', $this->UserId);
        })->get();
        if ($existingChat->count() == 0) {
            Chat::create([
                'user_id' => $this->UserId,
                'to_user_id' => 1,
                'status_id' => 1
            ]);
            $this->chatData = Chat::where('user_id', $this->UserId)->where('to_user_id', 1)->get();
            $this->getMessages();
        } else {
            $this->chatData = $existingChat;
            $this->getMessages();
        }
    }
    public function getMessages()
    {
        $this->chatMessage = ChatMessage::where('chat_id', $this->chatData[0]->id)->get();
        $this->dispatch('scroll-bottom');
    }
    public function sendChatMessage()
    {
        if ($this->message == '') return;
        ChatMessage::create([
            'chat_id' => $this->chatData[0]->id,
            'message' => $this->message,
            'user_id' => $this->UserId,
            'to_user_id' => 1,
            'status_id' => 1,
            'date_sent' => now()
        ]);

        $this->chatData[0]->toUser->notify(new MessageSent(
            $this->UserId,
            $this->message,
            $this->chatData[0]->id,
            1
        ));
        $this->message = '';
        $this->getMessages();
    }
    public function getUserId()
    {
        $this->UserId = auth()->user()->id;
    }
}
