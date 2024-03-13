<?php

namespace App\Livewire\Data;

use App\Models\BookStatus;
use Livewire\Component;

class DataShowStatuses extends Component
{
    public function render()
    {
        $statuses = BookStatus::all();
        return view('livewire.data.data-show-statuses', compact('statuses'));
    }
}
