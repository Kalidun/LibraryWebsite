<?php

namespace App\Http\Controllers\Library;

use Exception;
use App\Models\Book;
use App\Models\User;
use App\Models\BookStock;
use App\Models\BookCategory;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index(){
        return view('pages.library.index');
    }
    public function show($title){
        $bookData = Book::where('title', $title)->first();
        $bookStock = BookStock::where('book_id', $bookData->id)->where('status_id', 1)->get();
        return view('pages.library.show-book', compact('bookData', 'bookStock'));
    }
    public function borrow(Request $request){
        try {
            $bookStock = BookStock::where('book_id', $request->book_id)->where('status_id', 1)->count();
            $userData = User::where('id', Auth::user()->id)->first();
        // User maks borrowed 3 books at a day
        // if last day borrowed != now reset borrowed count
            if(date('Y-m-d', strtotime($userData->last_borrowed_date)) < date('Y-m-d')){
                $userData->borrowed_count = 0;
            }
            if($bookStock == 0){
                throw new Exception('Book Stock Not Available');
            }
            if($userData->borrowed_count >= 3){
                throw new Exception('You can\'t borrow more than 3 books at a day');
            }
            
        // Todo
        // Update Status stock book
        // Update User last_borrowed_date
        // Update User borrowed_count
        // Make table borrowedBook with user_id, book_id, date_borrowed, date_returned
        
            BookStock::where('book_id', $request->book_id)->where('status_id', 1)->first()->update([
                'status_id' => 2,
            ]);
            BorrowedBook::create([
                'user_id' => $userData->id,
                'book_id' => $request->book_id,
                'borrow_date' => date('Y-m-d'),
                'return_date' => $request->return_date
            ]);

            $userData->borrowed_count += 1;
            $userData->last_borrowed_date = date('Y-m-d');
            $userData->save();
            return redirect()->back()->with('success', 'Book Borrowed Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
