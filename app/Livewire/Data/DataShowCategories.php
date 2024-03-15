<?php

namespace App\Livewire\Data;

use App\Models\BookCategory;
use Livewire\Component;

class DataShowCategories extends Component
{
    public $name;
    public function render()
    {
        $categories = BookCategory::all();
        return view('livewire.data.data-show-categories', compact('categories'));
    }
    public function addCategory(){
        $this->validate([
            'name' => 'required'
        ]);
        BookCategory::create([
            'name' => $this->name
        ]);
        $this->resetVariables();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function resetVariables(){
        $this->name = null;
    }
}
