<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;


class cWorkarea extends Component
{
    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';
    public $showEditModal = false;

    //protected $queryString = ['sortField', 'sortDirection'];

    public $projectNumber;
    public $workareaName;

    public function mount($projectNumber, $workareaName)
    {
        $this->projectNumber = $projectNumber;
        $this->workareaName = $workareaName;
    }
    public function edit() {
        $this->showEditModal = true;
    }
    public function sortBy($field)
    {
        if($this->sortField===$field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc': 'asc';
        } else {
            $this->sortDirection='asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $project = Project::where('number', $this->projectNumber)->first();

        $workarea = $project->workareas->where('name', 'LIKE', str_replace("_", " ", $this->workareaName) )->first();

        return view('livewire.workarea', [
            'workarea' => $workarea
        ]);

           // 'project' => Project::where('number',$this->projectNumber)->first()
        //]);

        /* return view('livewire.projects', [
             'projects' => Project::search('number', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(100),
         ]); */


    }
}
