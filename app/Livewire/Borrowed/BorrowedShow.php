<?php

namespace App\Livewire\Borrowed;

use App\Models\Book;
use Livewire\Component;
use App\Models\BorrowedBook;

class BorrowedShow extends Component
{
    public $search;
    public function render()
    {
            $borrowedBooks = BorrowedBook::where('user_id', auth()->user()->id)->where('is_returned', 0)->whereHas('book', function($query) { $query->where('title', 'like', '%'.$this->search.'%'); })->get();

        return view('livewire.borrowed.borrowed-show',[
            'borrowedBooks' => $borrowedBooks
        ]);
    }
    public function updateSearch()
    {
        $this->search;
    }
}
