<?php

namespace App\Models;

use App\Models\User;
use App\Models\chat\Chat;
use App\Models\chat\ChatStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id','user_id', 'to_user_id', 'message', 'status_id', 'date_sent'];

    public function chat(){
        return $this->belongsTo(Chat::class);
    }
    public function status(){
        return $this->belongsTo(ChatStatus::class, 'status_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function toUser(){
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
