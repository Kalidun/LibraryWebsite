<?php

namespace App\Models\chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function toUser(){
        return $this->belongsTo(User::class, 'to_user_id');
    }
    public function status(){
        return $this->belongsTo(ChatStatus::class);
    }
}
