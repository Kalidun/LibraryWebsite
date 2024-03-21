<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatPage(){
        return view('pages.chat.index');
    }
    public function requestPage(){
        return view('pages.request.index');
    }
}
