<?php

namespace App\Models\chat;

use App\Models\User;
use App\Models\ChatMessage;
use App\Models\chat\ChatStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'to_user_id', 'status_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function toUser(){
        return $this->belongsTo(User::class, 'to_user_id');
    }
    public function status(){
        return $this->belongsTo(ChatStatus::class);
    }
    public function chatMessages(){
        return $this->hasMany(ChatMessage::class);
    }
}
