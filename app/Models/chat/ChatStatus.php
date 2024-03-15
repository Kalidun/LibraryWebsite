<?php

namespace App\Models\chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chat(){
        return $this->hasMany(Chat::class);
    }
}
