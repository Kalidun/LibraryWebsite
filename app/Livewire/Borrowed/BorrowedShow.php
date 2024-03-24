<?php

namespace App\Livewire\Borrowed;

use App\Models\Book;
use Livewire\Component;
use App\Models\BorrowedBook;

class BorrowedShow extends Component
{
    public $search;
    public $categories = "All";
    public function render()
    {
        $borrowedBooks = BorrowedBook::where('user_id', Auth()->user()->id)->orderBy('is_returned', 'asc')->whereHas('book', function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        });
        if ($this->categories != "All") {
            $borrowedBooks = $borrowedBooks->where('is_returned', $this->categories);
            };
        $borrowedBooks = $borrowedBooks->get();
        return view('livewire.borrowed.borrowed-show', [
            'borrowedBooks' => $borrowedBooks
        ]);
        
    }
    public function updateSearch()
    {
        $this->search;
    }
    public function updateCategory()
    {
        $this->categories;
    }
}
