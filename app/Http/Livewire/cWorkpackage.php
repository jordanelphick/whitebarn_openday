<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;


class cWorkpackage extends Component
{
    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';
    public $showEditModal = false;

    //protected $queryString = ['sortField', 'sortDirection'];

    public $projectNumber;
    public $workareaName;

    public $workpackageName;
    public function mount($projectNumber, $workareaName, $workpackageName)
    {
        $this->projectNumber = $projectNumber;
        $this->workareaName = $workareaName;
        $this->workpackageName = $workpackageName;
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

        //dd($project->number);

        $workarea = $project->workareas->where('name', 'LIKE', str_replace("_", " ", $this->workareaName) )->first();

        //dd($workarea->name);

        $workpackage = $workarea->workpackages->where('name', 'LIKE', str_replace("_", " ", $this->workpackageName) )->first();

        //dd($workpackage->name);
        //
        return view('livewire.workpackage', [
            'project' => $project,
            'workarea' => $workarea,
            'workpackage' => $workpackage
        ]);

        // 'project' => Project::where('number',$this->projectNumber)->first()
        //]);

        /* return view('livewire.projects', [
             'projects' => Project::search('number', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(100),
         ]); */


    }
}
