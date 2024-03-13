<?php

namespace App\Livewire\Data;

use App\Models\BookCategory;
use Livewire\Component;

class DataShowCategories extends Component
{
    public function render()
    {
        $categories = BookCategory::all();
        return view('livewire.data.data-show-categories', compact('categories'));
    }
}
