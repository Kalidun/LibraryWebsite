<?php

namespace App\Http\Controllers\Data\Edit;

use Exception;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\BookCategory;
use App\Models\BookStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function editBook(Request $request)
    {
        try {
            $request->validate([
                'book_id' => 'required|exists:books,id',
            ]);
            if ($request->book_category) {
                Book::where('id', $request->book_id)->update([
                    'category_id' => $request->book_category
                ]);
            }
            if ($request->book_image) {
                $book = Book::where('id', $request->book_id)->first();
                if ($book->image) {
                    unlink('storage/images/books/' . $book->image);
                }
                $imageName = time() . "." . $request->book_title . "." . $request->book_image->getClientOriginalExtension();
                $request->book_image->storeAs('public/images/books', $imageName);
                Book::where('id', $request->book_id)->update([
                    'image' => $imageName
                ]);
            }
            // masukin data yang terbaru
            if ($request->book_stock) {
                if ($request->book_stock > BookStock::where('book_id', $request->book_id)->count()) {
                    $bookMustAdded = $request->book_stock - BookStock::where('book_id', $request->book_id)->count();
                    for ($i = 0; $i < $bookMustAdded; $i++) {
                        BookStock::create([
                            'book_id' => $request->book_id,
                            'status_id' => 1,
                        ]);
                    }
                } else if ($request->book_stock < BookStock::where('book_id', $request->book_id)->count()) {
                    $bookMustRemoved = BookStock::where('book_id', $request->book_id)->count() - $request->book_stock;
                    if($bookMustRemoved > BookStock::where('book_id', $request->book_id)->where('status_id', 1)->count()){
                        throw new Exception('Cannot delete, Books is borrowed');
                    }
                    for ($i = 0; $i < $bookMustRemoved; $i++) {
                        BookStock::where('book_id', $request->book_id)->where('status_id', 1)->first()->delete();
                    }
                }
            }
            Book::where('id', $request->book_id)->update([
                'title' => $request->book_title,
                'author' => $request->book_author,
                'description' => $request->book_description,
            ]); 
            return redirect()->back()->with('success', 'Book updated successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function editCategory(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'edit_category_id' => 'required|exists:book_categories,id',
                'category_name' => 'required|unique:book_categories,name',
            ]);
            BookCategory::where('id', $request->edit_category_id)->update([
                'name' => $request->category_name
            ]);
            return redirect()->back()->with('success', 'Category updated successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function editStatus(Request $request)
    {
        try {
            $request->validate([
                'edit_status_id' => 'required|exists:book_statuses,id',
                'status_name' => 'required|unique:book_statuses,name',
            ]);
            BookStatus::where('id', $request->edit_status_id)->update([
                'name' => $request->status_name
            ]);
            return redirect()->back()->with('success', 'Status updated successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
