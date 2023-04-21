<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;


class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'projects' => Project::all()
        ]);
    }
}
