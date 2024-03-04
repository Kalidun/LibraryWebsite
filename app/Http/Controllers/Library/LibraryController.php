<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(){
        return view('pages.library.index');
    }
}
