<?php

namespace App\Http\Controllers\Data;

use App\Models\Book;
use App\Models\User;
use App\Models\BookStatus;
use App\Models\BookCategory;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function bookPage(){
        $dataBooks = Book::get();
        $dataUser = User::get();
        $dataCategory = BookCategory::get();
        $dataStatus = BookStatus::get();
        return view('pages.data.book', compact('dataBooks', 'dataUser', 'dataCategory', 'dataStatus'));
    }
    public function catagoryPage(){
        $dataBooks = Book::get();
        $dataUser = User::get();
        $dataCategory = BookCategory::get();
        $dataStatus = BookStatus::get();
        return view('pages.data.category', compact('dataBooks', 'dataUser', 'dataCategory', 'dataStatus'));
    }
    public function statusPage(){
        $dataBooks = Book::get();
        $dataUser = User::get();
        $dataCategory = BookCategory::get();
        $dataStatus = BookStatus::get();
        return view('pages.data.status', compact('dataBooks', 'dataUser', 'dataCategory', 'dataStatus'));
    }
    public function userPage(){
        $dataBooks = Book::get();
        $dataUser = User::get();
        $dataCategory = BookCategory::get();
        $dataStatus = BookStatus::get();
        return view('pages.data.user', compact('dataBooks', 'dataUser', 'dataCategory', 'dataStatus'));
    }
}
