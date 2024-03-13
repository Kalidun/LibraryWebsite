<?php

namespace App\Livewire\Data;

use App\Models\User;
use Livewire\Component;

class DataShowUsers extends Component
{
    public $search;
    public function render()
    {
        $this->search ? $users = User::where('username', 'like', '%' . $this->search . '%')->get() : $users = User::all();
        return view('livewire.data.data-show-users', compact('users'));
    }
    public function updateSearch()
    {
        $this->search;
    }
}
