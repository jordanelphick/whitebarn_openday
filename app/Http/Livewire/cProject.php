<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;

use App\Models\Workarea;
use App\Models\Workpackage;

class cProject extends Component
{
    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';
    public $showEditModal = false;

    public Project $project;
    public $projectNumber;
    public $status;

    public $workareaId;
    public $selectedWorkarea;
    public $workareaNumber;
    public $workareaName;

    public $workpackageId;
    public $selectedWorkpackage;
    public $workpackageNumber;
    public $workpackageName;

    //protected $queryString = ['sortField', 'sortDirection'];



    protected $rules = [
        'number' => 'required|numeric',
        'name' => 'required|string',
    ];

    protected $listeners = [
        'workareaUpdated' => 'refreshComponent',
        'workpackageUpdated' => 'refreshComponent'
    ];


    public function mount($projectNumber)
    {

        $project = Project::where('number', $projectNumber)->first();

        if($project) {

            $this->project = $project;

        } else {
            //TO DO: handle incorrect project number
        }

    }

    // view blade wire:click calls this function
    public function editWorkarea($id)
    {
        $this->workareaId = $id;
        $workarea = Workarea::findOrFail($this->workareaId);
        if ($workarea){
            $this->workareaNumber = $workarea->number;
            $this->workareaName = $workarea->name;
            $this->selectedWorkarea = $workarea;
        }
    }

    public function moveWorkarea($id, $incrementAmount)
    {
        $workarea = Workarea::findOrFail($id);
        if ($workarea) {
            $workarea->number = $workarea->number + $incrementAmount;
            $workarea->save();
            $this->emit('workareaUpdated');
        }
    }

    public function editWorkpackage($id)
    {

        $this->workpackageId = $id;
        //dd($id);
        $workpackage = Workpackage::findOrFail($this->workpackageId);
        //dd($workpackage->id);
        $this->workpackageNumber = $workpackage->number;
        $this->workpackageName = $workpackage->name;
        //dd($workarea->name);
        $this->selectedWorkpackage = $workpackage;
    }

    public function moveWorkpackage($id, $incrementAmount)
    {
        $workpackage = Workpackage::findOrFail($id);
        if ($workpackage) {
            $workpackage->number = $workpackage->number + $incrementAmount;
            $workpackage->save();
            $this->emit('workpackageUpdated');
        }
    }
    public function btnSaveWorkareaModal() {
        //dd(class_basename($this->selectedWorkarea));
        $workarea = Workarea::findOrFail($this->workareaId);

        //dd($this->workareaId);
        if ($workarea) {
            //dd($this->workareaId);
            $workarea->number = $this->workareaNumber;
            $workarea->name = $this->workareaName;
            $workarea->save();


            // Optionally, you can emit an event to inform other components about the change
            //$this->emit('workareaSaved');

            $this->emit('workareaUpdated');
            // Close the modal
            $this->selectedWorkarea = null;
        }
    }


    public function btnSaveWorkpackageModal() {
        //dd(class_basename($this->selectedWorkarea));
        $workpackage = Workpackage::findOrFail($this->workpackageId);

        //dd($this->workpackageId);
        if ($workpackage) {
            //dd($this->workpackageId);
            $workpackage->number = $this->workpackageNumber;
            $workpackage->name = $this->workpackageName;
            $workpackage->save();

            // Optionally, you can emit an event to inform other components about the change
            //$this->emit('workpacakgeSaved');

            $this->emit('workpackageUpdated');
            // Close the modal
            $this->selectedWorkpackage = null;
        }
    }
    public function edit() {
        $this->showEditModal = true;
    }
    public function sortBy($field) {
        if($this->sortField===$field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc': 'asc';
        } else {
            $this->sortDirection='asc';
        }

        $this->sortField = $field;
    }

    public function refreshComponent() {
        // Refresh the component
        $this->render();
    }
    public function render() {
       return view('livewire.project', [
            'project' => Project::where('number',$this->projectNumber)->first()
        ]);
    }
}
