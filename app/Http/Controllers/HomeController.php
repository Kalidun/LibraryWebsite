<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class HomeController extends Controller
{
    public function index(){
        $borrowedBooks = BorrowedBook::where('user_id', auth()->user()->id)->get();
        $totalUser = User::count();
        $totalBook = Book::count();
        $bookRecentImgs = Book::orderBy('id', 'desc')->limit(5)->get();
        return view('pages.home', compact('borrowedBooks', 'totalUser', 'totalBook' , 'bookRecentImgs'));
    }
}
