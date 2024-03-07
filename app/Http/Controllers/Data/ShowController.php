<?php

namespace App\Http\Controllers\Data;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookStock;

class ShowController extends Controller
{
    public function index()
    {
        $bookCategories = BookCategory::all();
        $books = Book::all();
        $bookStock = BookStock::all();
        return view('pages.data.index', compact('bookCategories', 'books', 'bookStock'));
    }
}
