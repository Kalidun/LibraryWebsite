<?php

namespace App\Models\chat;

use App\Models\chat\Chat;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chat(){
        return $this->hasMany(Chat::class);
    }
    public function chatMessage(){
        return $this->hasMany(ChatMessage::class);
    }
}
