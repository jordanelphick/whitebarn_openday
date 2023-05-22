<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Workarea;
class ProjectWorkareas extends Component
{
    public $project;
    public Workarea $editing;
    public $showEditModal = false;



    protected $rules = [
        'editing.name' => 'required',
        'editing.number' => 'required',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;

    }

    public function render()
    {
        return view('livewire.project-workareas', [
            'title' => $this->project->name . ' Workareas',
        ]);
    }

    public function showEditModal($id)
    {
        $this->editing = Workarea::find($id);
        $this->showEditModal = true;
    }

    public function saveWorkarea()
    {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function hideEditModal()
    {
        $this->showEditModal = false;

    }
    public function cancel() {

        $this->showEditModal = false;
    }

}
