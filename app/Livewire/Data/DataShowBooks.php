<?php

namespace App\Livewire\Data;

use App\Models\Book;
use Livewire\Component;
use App\Models\BookStock;
use App\Models\BookCategory;

class DataShowBooks extends Component
{

    public $search;
    public function render()
    {
        $bookCategories = BookCategory::all();
        $bookStock = BookStock::all();
        $books = $this->search ? Book::where('title', 'like', '%' . $this->search . '%')->get() : Book::all();
        $search = $this->search;

        return view('livewire.data.data-show-books', compact('bookCategories', 'books', 'bookStock', 'search'));
    }

    public function updateSearch()
    {
        $this->search;
    }
}
