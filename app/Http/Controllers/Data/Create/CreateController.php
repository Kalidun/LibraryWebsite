<?php

namespace App\Http\Controllers\Data\Create;

use App\Models\Book;
use App\Models\BookStock;
use App\Models\BookStatus;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function createCategory(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:book_categories,name',
            ]);
            BookCategory::create([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function createBook(Request $request)
    {
        try {
            $photoName = "";
            $request->validate([
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'category' => 'required',
                'description' => 'required|max:255',
                'image' => 'required|image',
                'stock' => 'required|numeric',
            ]);
            if ($request->image) {
                $photoName = time() . "." . $request->title . "." . $request->image->getClientOriginalExtension();
                $request->image->storeAs('public/images/books', $photoName);
                // $request->image->move(public_path('images'), $photoName);
            }
            Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'category_id' => $request->category,
                'description' => $request->description,
                'image' => $photoName,
            ]);
            for ($i = 0; $i < $request->stock; $i++) {
                BookStock::create([
                    'book_id' => Book::latest()->first()->id,
                    'status_id' => 1,
                ]);
            }
            return redirect()->back()->with('success', 'Book created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function createStatus(Request $request){
        try {
            $request->validate([
                'name' => 'required|unique:book_statuses,name',
            ]);
            BookStatus::create([
                'name' => $request->name
            ]);
            return redirect()->back()->with('success', 'Status created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
