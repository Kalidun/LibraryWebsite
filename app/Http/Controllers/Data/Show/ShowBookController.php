<?php

namespace App\Http\Controllers\Data\Show;

use App\Models\Book;
use App\Models\User;
use App\Models\BookStock;
use App\Models\BookStatus;
use App\Models\BookCategory;
use App\Models\BorrowedBook;
use App\Http\Controllers\Controller;

class ShowBookController extends Controller
{
    public function show($id)
    {
        $dataBook = Book::with('stocks')->where('id', $id)->first();
        $bookStocks = BookStock::where('book_id', $id)->get();
        $borrowedBook = BorrowedBook::where('book_id', $id)->where('is_returned', 0)->with('user')->get();
        $dataStatus = BookStatus::all();
        return view('pages.data.show.show-book', compact('bookStocks', 'dataBook', 'borrowedBook', 'dataStatus'));  
    }
}
