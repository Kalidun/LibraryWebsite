<?php

namespace App\Http\Controllers\Data\Delete;

use App\Models\Book;
use App\Models\BookStock;
use App\Models\BookStatus;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function deleteBook(Request $request)
    {
        try {
            $request->validate([
                'book_id' => 'required|exists:books,id',
            ]);
            BookStock::where('book_id', $request->book_id)->delete();
            Book::where('id', $request->book_id)->delete();
            return redirect()->back()->with('success', 'Book Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function deleteCategory(Request $request){
        try{
            $request->validate([
                'category_id' => 'required|exists:book_categories,id',
            ]);
            BookCategory::where('id', $request->category_id)->delete();
            return redirect()->back()->with('success', 'Category Deleted Successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function deleteStatus(Request $request){
        try{
            $request->validate([
                'status_id' => 'required|exists:book_statuses,id',
            ]);
            BookStatus::where('id', $request->status_id)->delete();
            return redirect()->back()->with('success', 'Status Deleted Successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
