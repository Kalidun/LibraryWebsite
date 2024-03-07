<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookStock;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(){
        return view('pages.library.index');
    }
    public function show($id){
        $bookData = Book::find($id);
        $bookStock = BookStock::where('book_id', $id)->get();
        dd($bookData, $bookStock);
    }
}
