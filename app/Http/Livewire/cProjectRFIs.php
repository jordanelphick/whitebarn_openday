<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Rfi;
use Livewire\Component;
use function PHPUnit\Framework\isNull;
use App\Models\Message;

class cProjectRFIs extends Component
{

    public Project $project;
    public $projectNumber;
    public $notificationMsg;
    public $showQuickEditRFIModal;
    public $selectedRfi;
    public $rfiNumber;
    public $rfiName;
    public $selectOptionCreatedById;                // this is stores user selection from dropdown list of options
    public $selectOptionWorkpackageId;              // this is stores user selection from dropdown list of options
    public $selectOptionOrganisationReceiverId;     // this is stores user selection from dropdown list of options

    public $messageBody;

    public function rules()
    {
        return [
            'rfiNumber' => 'required',
            'rfiName' => 'required',
            'selectOptionCreatedById' => 'required',
            'selectOptionOrganisationReceiverId' => 'required',
            'selectOptionWorkpackageId' => 'required',
            'messageBody' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rfiNumber.required' => 'The RFI Number field is required.',
            'rfiName.required' => 'The RFI Name field is required.',
            'selectOptionCreatedById.required' => 'The Created By field is required.',
            'selectOptionOrganisationReceiverId.required' => 'The Work Package field is require',
            'selectOptionWorkpackageId.required' => 'The Work Package field is required.',
            'messageBody.required' => 'The Message Body field is required.',
        ];
    }

    public function mount($projectNumber) {
        $project = Project::where('number', $projectNumber)->first();
        if($project) {
            $this->project = $project;
        } else {
            //TO DO: handle incorrect project number
        }

    }
    public function nullAll(){
        $this->showQuickEditRFIModal = null;
    }

    public function createRequestForInformation(){
        $this->nullAll();
        $rfi = new Rfi();
        // Populate the parameters that are displayed in the view:
        $this->rfiNumber =
            $this->project->acronym .'-'.
            auth()->user()->organisations->first()->acronym . '-'.
            'RFI-' . str_pad(Rfi::where('organisation_sender', 1)->first()->id +1, 4, '0', STR_PAD_LEFT) .
            ' (TBC)';
        $this->rfiName = '';                        // required
        $this->selectedRfi = $rfi;                  // required
        $this->showQuickEditRFIModal = true;        // trigger the modal to open through entanglement
    }

    public function btnSaveQuickEditRfiModal(){
        $this->validate(); // Trigger the validation rules

        $rfi = $this->selectedRfi;
        //dd('here');
        //dd($this->selectOptionWorkpackageId);

        if($rfi->id==null) {
            $rfi->rfiNumber =
                $this->project->acronym .'-'.
                auth()->user()->organisations->first()->acronym . '-'.
                'RFI-' . str_pad(Rfi::where('organisation_sender', 1)->first()->id +1, 4, '0', STR_PAD_LEFT);
        } else {
            $rfi->number = $this->rfiNumber;        // Check if this is required. If this is an existing RFI, then the number should never change.
        }

        $rfi->name = $this->rfiName;
        $rfi->status = 'open';

        $rfi->workpackage_id = $this->selectOptionWorkpackageId;          // this is stores user selection from dropdown list of options
        $rfi->user_id = $this->selectOptionCreatedById;
        $rfi->save();

        $message = new Message();
        $message->rfi_id = $rfi->id;
        $message->user_id = $rfi->user_id;
        $message->subject = '';
        $message->visibility = 'public';
        $message->body = $this->messageBody;
        $message->save();
        $this->emit('rfiUpdated');
        $this->showQuickEditRFIModal = false;           // trigger the modal to close through entanglement
    }

    public function btnCancelModal(){
        $this->showQuickEditRFIModal = false;
    }

    public function render()
    {
        if (isNull($this->selectedRfi)) {
            $this->selectOptionCreatedById = auth()->user()->id;            // by default select the auth user from the dropdown
        } else {
            $this->selectOptionCreatedById = $this->selectedRfi->user_id;
        }

        return view('livewire.requests-for-information', [
            'notification' => $this->notificationMsg,
            'project' => Project::where('number',$this->projectNumber)->first()
        ]);
    }
}
