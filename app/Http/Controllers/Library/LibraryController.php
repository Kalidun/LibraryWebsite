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
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    public function generateQRToBorrow($id)
    {
        try {
            $bookData = Book::where('id', $id)->first();
            if (date('Y-m-d', strtotime(Auth::user()->last_borrowed_date)) < date('Y-m-d')) {
                Auth::user()->borrowed_count = 0;
            }
            if (BookStock::where('book_id', $bookData->id)->where('status_id', 1)->get()) {
                $bookStock = BookStock::where('book_id', $bookData->id)->where('status_id', 1)->first();
            } else {
                throw new Exception('Book Stock Not Available');
            }
            if (Auth::user()->borrowed_count >= 3) {
                throw new Exception("You can't borrow more than 3 books in one day.");
            }
            if (BorrowedBook::where('user_id', Auth::user()->id)->where('book_id', $bookData->id)->where('is_returned', 0)->exists()) {
                throw new Exception('Book Already Borrowed');
            }
            // make id of data to encrypt for make url
            $encryptBook = Crypt::encryptString($bookData->id);
            $encryptStock = Crypt::encryptString($bookStock->id);
            $encryptUserId = Crypt::encryptString(Auth::user()->id);
            // localhost url
            $url = 'http://192.168.97.33:8000/' . 'borrow/' . $encryptBook . '/' . $encryptStock . '/' . $encryptUserId;
            return response(QrCode::size(300)->generate($url));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
    public function readQRCodeToBorrow($encryptBook, $encryptStock, $encryptUserId)
    {
        try {
            $bookId = Crypt::decryptString($encryptBook);
            $stockId = Crypt::decryptString($encryptStock);
            $userId = Crypt::decryptString($encryptUserId);
            $userData = User::where('id', $userId)->first();
            // dd($bookId, $stockId, $userId);
            //check last borrowed date
            if (date('Y-m-d', strtotime($userData->last_borrowed_date)) < date('Y-m-d')) {
                $userData->borrowed_count = 0;
            }
            if ($userData->borrowed_count >= 3) {
                throw new Exception("You can't borrow more than 3 books in one day.");
            }
            if (BorrowedBook::where('user_id', $userId)->where('book_id', $bookId)->where('is_returned', 0)->exists()) {
                throw new Exception('Book Already Borrowed');
            }
            if (BookStock::where('id', $stockId)->where('status_id', 1)->first() == null) {
                throw new Exception('Book Stock Not Available');
            }
            BookStock::where('id', $stockId)->where('status_id', 1)->first()->update([
                'status_id' => 2,
            ]);
            BorrowedBook::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'stock_id' => $stockId,
            ]);
            User::where('id', $userId)->update([
                'last_borrowed_date' => date('Y-m-d'),
                'borrowed_count' => $userData->borrowed_count + 1,
            ]);
            return redirect()->route('borrowed.index')->with('success', 'Book Borrowed Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function generateQRToReturn(Request $request)
    {
        try {
            $stockId = Crypt::encryptString($request->stock_id);
            $borrowedId = Crypt::encryptString($request->borrowed_id);
            $statusId = Crypt::encryptString($request->status);
            $userId = Crypt::encryptString(Auth::user()->id);
            $url = 'http://192.168.97.33:8000/' . 'return/' . $stockId . '/' . $borrowedId . '/' . $statusId . '/' . $userId;

            return QrCode::size(300)->generate($url);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
    public function readQRCodeToReturn($stockIdEncrypted, $borrowedIdEncrypted, $statusIdEncrypted, $userIdEncrypted)
    {
        try {
            $stockId = Crypt::decryptString($stockIdEncrypted);
            $borrowedId = Crypt::decryptString($borrowedIdEncrypted);
            $statusId = Crypt::decryptString($statusIdEncrypted);
            $userId = Crypt::decryptString($userIdEncrypted);
            BorrowedBook::where('id', $borrowedId)->where('user_id', $userId)->update([
                'is_returned' => 1,
            ]);
            BookStock::where('id', $stockId)->update([
                'status_id' => $statusId,
            ]);
            return redirect()->route('borrowed.index')->with('success', 'Book Returned Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('borrowed.index')->with('error', $th->getMessage());
        }
    }
}
