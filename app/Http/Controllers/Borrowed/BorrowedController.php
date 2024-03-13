<?php

namespace App\Http\Controllers\Borrowed;

use App\Models\BookStatus;
use Carbon\Carbon;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowedController extends Controller
{
    public function index(){
        return view('pages.borrowed.index');
    }
    public function show($id){
        $bookData = BorrowedBook::where('id', $id)->where('is_returned', 0)->with('book')->first();
        
        $return_date = Carbon::parse($bookData->return_date);
        
        $deadline = $return_date->diffInDays(now());
        $bookStatus = BookStatus::all();
        
        return view('pages.borrowed.show',compact('bookData', 'deadline', 'bookStatus'));
    }
}
