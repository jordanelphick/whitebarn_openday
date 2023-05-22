<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workarea;

class ShowModelComponent extends Component
{

    public $model;

    public function openModal($id)
    {
        $this->model = Workarea::find($id);
        $this->dispatchBrowserEvent('show-modal');
    }

    public function closeModal()
    {
        $this->model = null;
        $this->dispatchBrowserEvent('hide-modal');
    }

    public function render()
    {
        return view('livewire.show-model-component');
    }
}
