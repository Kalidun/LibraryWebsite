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
    public function index()
    {
        return view('pages.library.index');
    }
    public function show($id)
    {
        $bookData = Book::where('id', $id)->first();
        $bookStock = BookStock::where('book_id', $bookData->id)->where('status_id', 1)->get();
        return view('pages.library.show-book', compact('bookData', 'bookStock'));
    }
    public function borrow(Request $request)
    {
        try {
            $bookStock = BookStock::where('book_id', $request->book_id)->where('status_id', 1)->count();
            $userData = User::where('id', Auth::user()->id)->first();
            //check last borrowed date
            if (date('Y-m-d', strtotime($userData->last_borrowed_date)) < date('Y-m-d')) {
                $userData->borrowed_count = 0;
            }
            //check book stock
            if ($bookStock == 0) {
                throw new Exception('Book Stock Not Available');
            }
            //check borrowed count
            if ($userData->borrowed_count >= 3) {
                throw new Exception("You can't borrow more than 3 books in one day.");
            }
            //check already borrowed
            if (BorrowedBook::where('user_id', $userData->id)->where('book_id', $request->book_id)->where('is_returned', 0)->exists()) {
                throw new Exception('You have already borrowed this book.');
            }

            $stockId = BookStock::where('book_id', $request->book_id)->where('status_id', 1)->first()->id;
            if (BookStock::where('id', $stockId)->first()->status_id != 1) {
                throw new Exception('Book Stock Not Available');
            }
            // dd(BookStock::where('id', $stockId)->where('status_id', 1)->first());
            BookStock::where('id', $stockId)->where('status_id', 1)->first()->update([
                'status_id' => 2,
            ]);
            BorrowedBook::create([
                'user_id' => $userData->id,
                'book_id' => $request->book_id,
                'stock_id' => $stockId,
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
    public function returnBook(Request $request)
    {
        try{
        // Todo
        //1. Update Book Stock to Request Status
        // 2. Update Borrowed Book is_returned to 1
        // dd(BorrowedBook::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->get());

        // Get Stock iD
        $stockId = BorrowedBook::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->first()->stock_id;
        BookStock::where('id', $stockId)->where('status_id', 2)->first()->update([
            'status_id' => $request->status,
        ]);
        $borrowedBook = BorrowedBook::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->first();
        if($request->status == 1){
            BorrowedBook::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->first()->update([
                'is_returned' => 1
            ]);
            return redirect()->route('borrowed.index')->with('success', 'Book Returned Successfully');
        }else {
            BorrowedBook::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->first()->update([
                'is_returned' => 0
            ]);
            return redirect()->route('borrowed.index')->with('message', 'Book Successfully Reported');
        }
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
