<?php

namespace App\Livewire\Borrowed;

use App\Models\BorrowedBook;
use Livewire\Component;

class BorrowedShow extends Component
{
    public function render()
    {
        $borrowedBooks = BorrowedBook::where('user_id', auth()->user()->id)->where('is_returned', 0)->get();
        return view('livewire.borrowed.borrowed-show',[
            'borrowedBooks' => $borrowedBooks
        ]);
    }
}
