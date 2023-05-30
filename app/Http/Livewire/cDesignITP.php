<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;

use App\Models\Workarea;
use App\Models\Workpackage;

class cDesignITP extends Component
{

    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';


    public Project $project;
    public $projectNumber;
    public $status;

    // MODALS
    public $showRfiSummaryModal;
    public $showQuickEditWorkareaModal;
    public $showDeleteWorkareaModal;
    public $showQuickEditWorkpackageModal;
    public $showDeleteWorkpackageModal;

    // WORK AREA
    public $selectedWorkarea;
    public $quickEditWorkarea;
    //public $deleteWorkarea;
    public $workareaNumber;
    public $workareaName;



    // WORK PACKAGE
    public $selectOptionWorkareaId;         // this is stores user selection from dropdown list of options
    public $selectOptionAccountableId;      // this is stores user selection from dropdown list of options
    public $workpackageId;
    public $selectedWorkpackage;
    public $workpackageNumber;
    public $workpackageName;


    public $timer = 0;
    //protected $queryString = ['sortField', 'sortDirection'];
    public $showNotification;
    public $notificationMsg;


    protected $rules = [
        'workareaNumber' => 'required|numeric',
        'workareaName' => 'required|string',
    ];

    protected $listeners = [

        'workareaUpdated' => 'refreshComponent',
        'workpackageUpdated' => 'refreshComponent',
        'timerUpdated' =>'refreshComponentTimerEnded',
        'hideNotification'=>'refreshComponentTimerEnded',
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

    public function nullAll() {
        $this->showQuickEditWorkareaModal = null;
        $this->showDeleteWorkareaModal = null;
        $this->quickEditWorkarea = null;
        //$this->deleteWorkarea = null;
        $this->selectedWorkpackage = null;
        $this->selectOptionWorkareaId = null;
        $this->selectOptionAccountableId = null;
    }
    public function createWorkarea() {
        $this->nullAll();
        $workarea = new Workarea();
        // Populate the parameters that are displayed in the view:
        $this->workareaNumber = '';                     // required
        $this->workareaName = '';                       // required
        $workarea->project_id = $this->project->id;     // required
        $this->selectedWorkarea = $workarea;            // required
        $this->showQuickEditWorkareaModal = true;       // trigger the modal to open through entanglement
    }
    public function createWorkpackage() {
        $this->nullAll();
        $workpackage = new Workpackage();
        // Populate the parameters that are displayed in the view:
        $this->workpackageNumber = '';                     // required
        $this->workpackageName = '';                       // required
        $workpackage->workarea_id = '';     // required
        $this->selectedWorkpackage = $workpackage;            // required
        $this->showQuickEditWorkpackageModal = true;       // trigger the modal to open through entanglement
    }
    /* SHOW QUICK EDIT WORK AREA MODAL */
    public function showQuickEditWorkareaModal($id){
        $workarea = Workarea::findOrFail($id);
        if ($workarea){
            // Populate the parameters that are displayed in the view:
            $this->workareaNumber = $workarea->number;      // required
            $this->workareaName = $workarea->name;          // required
            $this->selectedWorkarea = $workarea;            // required
            $this->showQuickEditWorkareaModal = true;       // trigger the modal to open through entanglement
        }
    }
    /* SHOW QUICK EDIT WORK PACKAGE MODAL */
    public function showQuickEditWorkpackageModal($id){
        $this->nullAll();
        $workpackage = Workpackage::findOrFail($id);
        if ($workpackage){
            // Populate the parameters that are displayed in the view:
            $this->workpackageNumber = $workpackage->number;                    // required
            $this->workpackageName = $workpackage->name;                        // required
            $this->selectedWorkpackage = $workpackage;                          // required
            $this->selectOptionWorkareaId = $workpackage->workarea_id;          // required
            $this->selectOptionAccountableId = $workpackage->accountable_id;    // required
            $this->showQuickEditWorkpackageModal = true;                // trigger the modal to open through entanglement
        }
    }

    public function btnSaveQuickEditWorkareaModal() {
        $workarea = $this->selectedWorkarea;
        $workarea->number = $this->workareaNumber;
        $workarea->name = $this->workareaName;
        $workarea->project_id = $this->project->id;     // TO DO: this is required for this location, however reinforcing the project_id would ideally not be required at this function
        $workarea->save();
        $this->emit('workareaUpdated');
        $this->showQuickEditWorkareaModal = false;
        $this->nullAll();
    }

    public function btnSaveQuickEditWorkpackageModal() {
        $workpackage = $this->selectedWorkpackage;
        //dd($this->selectOptionWorkareaId);
        $workpackage->number = $this->workpackageNumber;
        $workpackage->name = $this->workpackageName;
        $workpackage->accountable_id = $this->selectOptionAccountableId;
        $workpackage->phase = 'initial';
        $workpackage->workarea_id = $this->selectOptionWorkareaId;          // this is stores user selection from dropdown list of options
        $workpackage->save();
        $this->emit('workpackageUpdated');
        $this->showQuickEditWorkpackageModal = false;           // trigger the modal to close through entanglement
    }


    /* SHOW DELETE WORK AREA MODAL */
    public function showDeleteWorkareaModal($id) {
        $this->nullAll();
        $workarea = Workarea::findOrFail($id);
        if ($workarea){
            // Populate the parameters that are displayed in the view:
            $this->selectedWorkarea = $workarea;            // required
            $this->showDeleteWorkareaModal = true;          // trigger the modal to open through entanglement
        }
    }
    /* SHOW DELETE WORK PACKAGE MODAL */
    public function showDeleteWorkpackageModal($id) {
        $this->nullAll();
        $workpackage = Workpackage::findOrFail($id);
        if ($workpackage){
            // Populate the parameters that are displayed in the view:
            $this->selectedWorkpackage = $workpackage;      // required
            $this->showDeleteWorkpackageModal = true;       // trigger the modal to open through entanglement
        }
    }

    public function btnDeleteWorkarea() {
        $workarea = $this->selectedWorkarea;

        // TO DO: Need to work on this, the RFI's have a foreign key constraint against the workpackage that prevents it from being deleted.
        // Probably need to do a check here to see if the workarea has Records or RFI's and flag this to the user to relocate them (if desired)
        if ($workarea) {
            $this->quickEditWorkarea = null;
            //$this->deleteWorkarea = null;
            $this->selectedWorkpackage = null;

            $relatedRecords = collect();

            foreach($workarea->workpackages as $workpackage){
                $relatedRecords = $relatedRecords->merge($workpackage->records);
            }

            foreach ($relatedRecords as $record) {
                $record->users()->detach();
            }

            $relatedRecords->each->delete();
            $workarea->delete();
            $this->emit('workareaUpdated');
            // Close the modal
            $this->showDeleteWorkareaModal = false;
        }
    }

    public function moveWorkarea($id, $incrementAmount){
        $this->nullAll();
        $workarea = Workarea::findOrFail($id);
        if ($workarea) {
            $workarea->number += $incrementAmount;
            $workarea->save();
            $this->emit('workareaUpdated');
        }
    }








    public function moveWorkpackage($id, $incrementAmount)
    {
        $this->quickEditWorkarea = null;
        //$this->deleteWorkarea = null;
        $this->selectedWorkpackage = null;
        $workpackage = Workpackage::findOrFail($id);
        if ($workpackage) {
            $workpackage->number = $workpackage->number + $incrementAmount;
            $workpackage->save();
            $this->emit('workpackageUpdated');
        }
    }





    public function btnCancelModal(){
        $this->showDeleteWorkareaModal = false;
        $this->showDeleteWorkpackageModal = false;
        $this->showQuickEditWorkareaModal = false;
        $this->showQuickEditWorkpackageModal = false;
        $this->showRfiSummaryModal = false;
    }



    public function showRfiSummaryModal($id) {
        $this->nullAll();
        $workpackage = Workpackage::findOrFail($id);
        if ($workpackage) {

            // Populate the parameters that are displayed in the view:
            $this->workpackageNumber = $workpackage->number;                    // required
            $this->workpackageName = $workpackage->name;                        // required
            $this->selectedWorkpackage = $workpackage;                          // required
            $this->selectOptionWorkareaId = $workpackage->workarea_id;          // required
            $this->selectOptionAccountableId = $workpackage->accountable_id;    // required
            $this->showRfiSummaryModal = true;
        }
    }
    /*
    public function edit() {
        $this->showEditModal = true;
    }
    */
    public function sortBy($field) {
        if($this->sortField===$field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc': 'asc';
        } else {
            $this->sortDirection='asc';
        }

        $this->sortField = $field;
    }

    public function refreshComponent() {
        $this->dispatchBrowserEvent('startTimer');
        //$this->startTimer();
        $this->notificationMsg = 'yayyyyy';
        $this->showNotification = true;
        // Refresh the component
        $this->render();
    }
    public function refreshComponentTimerEnded() {

        $this->timer  = null;
        $this->notificationMsg = null;
        $this->showNotification = false;
        // Refresh the component
        $this->render();
    }
    public function startTimer(){
        $this->timer = 0;

        $this->emit('timerStarted');
    }
    public function hideNotification()
    {
        $this->showNotification = false;
    }
    public function incrementTimer()
    {
        $this->timer++;
    }
    public function render() {
       return view('livewire.design-itp', [
            'notification' => $this->notificationMsg,
            'project' => Project::where('number',$this->projectNumber)->first()
        ]);
    }

}
