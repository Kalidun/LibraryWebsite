<?php

namespace App\Http\Controllers\Create;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        return view('pages.create.index');
    }
}
