<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\BookStock;
use App\Models\BookCategory;

class ShowBook extends Component
{
    public $categories = 'All' ;
    public $search; 

    public function render()
    {
        $bookCategories = BookCategory::all();

        $books = Book::with(['stocks', 'category'])->orderBy('id', 'DESC');

        if($this->categories != 'All' || $this->search){
            if($this->categories != 'All' && $this->search == null){
                $books = $books->where('category_id', $this->categories)->latest();
            }
            if($this->search  && $this->categories == 'All'){
                $books = $books->filter($this->search);
            }
            if($this->search && $this->categories != 'All'){
                $books = $books->where('category_id', $this->categories)->filter($this->search);
            }
        }

        $books = $books->get();
        
        return view('livewire.show-book', [
            'books' => $books,
            'bookCategories' => $bookCategories,
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
