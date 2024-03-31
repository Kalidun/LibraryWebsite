<?php

namespace App\Http\Controllers\Library;

use App\Models\BookStatus;
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
        if (BorrowedBook::where('book_id', $bookData->id)->where('user_id', Auth::user()->id)->where('status_id', 2)->get()->count() > 0) {
            $bookingBook = BorrowedBook::where('book_id', $bookData->id)->where('user_id', Auth::user()->id)->where('status_id', 2)->first();
            return view('pages.library.show-book', [
                'bookData' => $bookData,
                'bookStock' => $bookStock,
                'bookingBook' => $bookingBook,
                'borrowedBook' => null
            ]);
        }
        if(BorrowedBook::where('book_id', $bookData->id)->where('user_id', Auth::user()->id)->where('status_id', 4)->get()->count() > 0) {
            $borrowedBook = BorrowedBook::where('book_id', $bookData->id)->where('user_id', Auth::user()->id)->where('status_id', 4)->first();
            return view('pages.library.show-book', [
                'bookData' => $bookData,
                'bookStock' => $bookStock,
                'bookingBook' => null,
                'borrowedBook' => $borrowedBook
            ]);
        }
        return view('pages.library.show-book', [
            'bookData' => $bookData,
            'bookStock' => $bookStock,
            'bookingBook' => null,
            'borrowedBook' => null
        ]);
    }
    public function BookingBook($id)
    {
        try {
            if (date('Y-m-d', strtotime(Auth::user()->last_borrowed_date)) < date('Y-m-d')) {
                Auth::user()->borrowed_count = 0;
            }
            if (Auth::user()->borrowed_count >= 3) {
                throw new Exception("You can't borrow more than 3 books in one day.");
            }
            $bookId = Book::where('id', $id)->first();
            if (BookStock::where('book_id', $bookId->id)->where('status_id', 1)->get() == null) {
                throw new Exception('Book Stock Not Available');
            }
            $bookStock = BookStock::where('book_id', $bookId->id)->where('status_id', 1)->first();
            if (BorrowedBook::where('user_id', Auth::user()->id)->where('book_id', $id)->where('is_returned', 0)->where('status_id', 2)->exists()) {
                throw new Exception('Book Already Booked');
            }
            $bookStock->update([
                'status_id' => 2, // pending
            ]);
            BorrowedBook::create([
                'user_id' => Auth::user()->id,
                'book_id' => $bookId->id,
                'stock_id' => $bookStock->id,
                'status_id' => 2,
                'is_returned' => 0,
            ]);
            return redirect()->back()->with('success', 'Book Booked Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function cancelBooking($id){
        try{
            $borrowedData = BorrowedBook::where('id', $id)->first();
            $borrowedData->update([
                'status_id' => 3,
                'is_returned' => 1
            ]);
            BookStock::where('id', $borrowedData->stock_id)->update([
                'status_id' => 1
            ]);
            return redirect()->back()->with('success', 'Book Cancelled Successfully');
        } catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function cancelBookingAjax($id){
        try{
            $borrowedData = BorrowedBook::where('id', $id)->first();
            $borrowedData->update([
                'status_id' => 3,
                'is_returned' => 1
            ]);
            BookStock::where('id', $borrowedData->stock_id)->update([
                'status_id' => 1
            ]);
            return response()->json(['success' => 'Book Cancelled Successfully']);
        } catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
    public function generateQRToBorrow($id)
    {
        try {
            $borrowedData = BorrowedBook::where('id', $id)->first();

            $encryptBorrowedId = Crypt::encryptString($borrowedData->id);
            $encryptStockId = Crypt::encryptString($borrowedData->stock_id);
            // $url = 'http://192.168.97.33:8000/' . 'borrow/' . $encryptBorrowedId . '/' . $encryptStockId;
            // $url = 'http://192.168.138.33:8000/' . 'borrow/' . $encryptBorrowedId . '/' . $encryptStockId;
            $url = 'http://192.168.100.92:8000/' . 'borrow/' . $encryptBorrowedId . '/' . $encryptStockId;
            return response(QrCode::size(300)->generate($url));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
    public function readQRCodeToBorrow($encryptBorrowedId, $encryptStockId)
    {
        try {
            $BorrowedId = Crypt::decryptString($encryptBorrowedId);
            $stockId = Crypt::decryptString($encryptStockId);

            $borrowedData = BorrowedBook::where('id', $BorrowedId)->first();
            $userData = User::where('id', $borrowedData->user_id)->first();
            if (date('Y-m-d', strtotime($userData->last_borrowed_date)) < date('Y-m-d')) {
                $userData->borrowed_count = 0;
            }
            if ($userData->borrowed_count >= 3) {
                throw new Exception("You can't borrow more than 3 books in one day.");
            }
            BorrowedBook::where('id', $BorrowedId)->update([
                'status_id' => 4, 
            ]);
            BookStock::where('id', $stockId)->update([
                'status_id' => 4,
            ]);

            $userData->borrowed_count += 1;
            $userData->last_borrowed_date = date('Y-m-d');
            $userData->save();

            return view('pages.invoice.borrow',[
                'borrowedData' => BorrowedBook::where('id', $BorrowedId)->first()
            ])->with('success', 'Book Borrowed Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function generateQRToReturn($borrowedId)
    {
        try {
            $borrowedId = Crypt::encryptString($borrowedId);
            // $url = 'http://192.168.97.33:8000/' . 'return/' . $borrowedId;
            // $url = 'http://192.168.138.33:8000/' . 'return/' . $borrowedId;
            $url = 'http://192.168.100.92:8000/' . 'return/' . $borrowedId;

            return QrCode::size(300)->generate($url);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
    public function readQRCodeToReturn($borrowedIdEncrypted)
    {
        try {
            $borrowedId = Crypt::decryptString($borrowedIdEncrypted);
            $dataStatus = BookStatus::all();
            $borrowedData = BorrowedBook::where('id', $borrowedId)->first();

            return view('pages.invoice.return',[
                'dataStatus' => $dataStatus,
                'borrowedData' => $borrowedData
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('borrowed.index')->with('error', $th->getMessage());
        }
    }
    public function confirmedStatus(Request $request){
        try{
            $borrowedData = BorrowedBook::where('id', $request->borrowed_id)->first();
            $stockData = BookStock::where('id', $borrowedData->stock_id)->first();
            $borrowedData->update([
                'status_id' => $request->status_id,
                'is_returned' => 1
            ]);
            $stockData->update([
                'status_id' => $request->status_id
            ]);
            return response()->json(['success' => 'Status Updated Successfully']);
        } catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
