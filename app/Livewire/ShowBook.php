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
        $books = [];
        $bookStock = BookStock::all();
        if($this->categories != 'All' || $this->search){
            if($this->categories != 'All' && $this->search == null){
                $books = Book::where('category_id', $this->categories)->latest()->orderBy('id', 'DESC')->get();
            }
            if($this->search  && $this->categories == 'All'){
                $books = Book::filter($this->search)->orderBy('id', 'DESC')->get();
            }
            if($this->search && $this->categories != 'All'){
                $books = Book::where('category_id', $this->categories)->filter($this->search)->orderBy('id', 'DESC')->get();
            }
        }else{
            $books = Book::all();
        }
        return view('livewire.show-book', [
            'books' => $books,
            'bookCategories' => $bookCategories,
            'bookStock' => $bookStock
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
