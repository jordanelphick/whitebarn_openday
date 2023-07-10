<?php

namespace App\Http\Livewire;

use App\Models\Organisation;
use App\Models\Project;
use App\Models\Rfi;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use function PHPUnit\Framework\isNull;
use App\Models\Message;
use App\Models\Attachment;
use Illuminate\Support\Facades\DB;

class cProjectRFIs extends Component
{
    use WithFileUploads;
    public Project $project;
    public $projectNumber;
    public $notificationMsg;
    public $showQuickEditRFIModal;
    public $selectedRfi;
    public $rfiNumber;
    public $rfiName;
    public $selectOptionCreatedById;                // this is stores user selection from dropdown list of options
    public $selectOptionWorkpackageId;              // this is stores user selection from dropdown list of options
    public $selectOptionReceiverOrganisationId;     // this is stores user selection from dropdown list of options
    public $selectOptionSenderOrganisationId;       // this is stores user selection from dropdown list of options
    public $messageBody;
    public $fileUploads = [];

    public function rules()
    {
        return [
            'rfiNumber' => 'required',
            'rfiName' => 'required',
            'selectOptionCreatedById' => 'required',
            'selectOptionReceiverOrganisationId' => 'required',
            'selectOptionSenderOrganisationId' => 'required',
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
            'selectOptionOrganisationReceiverId.required' => 'The Work Package field is required.',
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
        $this->rfiNumber = null;
        $this->rfiName = null;
        $this->selectOptionCreatedById = null;
        $this->selectOptionWorkpackageId = null;
        $this->selectOptionOrganisationReceiverId = null;
    }

    public function fileUploadsChanged($files){
        dd('here1');
        $this->fileUploads = $files;
    }

    public function uploadFiles()
    {
        dd('here2');
        $this->validate();

        foreach ($this->fileUploads as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);
            // Save the attachment record to the database or associate it with the Message model
        }

        // Redirect or display a success message
    }

    public function createRequestForInformation(){

        $this->nullAll();
        $rfi = new Rfi();
        $rfi->project_acronym = $this->project->acronym;
        //dd($rfi->project_acronym);
        // Populate the parameters that are displayed in the view:

        $currentRfiSenderIndex = Rfi::where('sender_organisation_id', auth()->user()->organisations->first()->id)
            ->where('project_acronym', $rfi->project_acronym)
            ->orderBy('id', 'desc')
            ->value(DB::raw('sender_index'));

        if ($currentRfiSenderIndex== null) {
            $newRfiSenderIndex = 1;
        } else {
            $newRfiSenderIndex = str_pad($currentRfiSenderIndex +1, 4, '0', STR_PAD_LEFT);
        }

        $userOrganisation = auth()->user()->organisations->first();


        $this->rfiNumber = sprintf(
            '%s-%s-RFI-%s',
            $rfi->project_acronym,
            $userOrganisation->acronym,
            $newRfiSenderIndex
        );

        $this->rfiNumber = $rfi->project_acronym .'-'.
            auth()->user()->organisations->first()->acronym . '-'.
            'RFI-' . str_pad($newRfiSenderIndex, 4, '0', STR_PAD_LEFT);





        $this->rfiName = '';                        // required
        $this->selectedRfi = $rfi;                  // required
        $this->showQuickEditRFIModal = true;        // trigger the modal to open through entanglement
    }

    public function btnSaveQuickEditRfiModal(){


        //$this->validate(); // Trigger the validation rules


        $rfi = $this->selectedRfi;


        $userOrganisationId = auth()->user()->organisations->first()->id;
        $projectAcronym = $this->project->acronym;

        $currentRfiSenderIndex = Rfi::where('sender_organisation_id', $userOrganisationId)
            ->where('project_acronym', $projectAcronym)
            ->orderBy('id', 'desc')
            ->value('sender_index');

        if ($currentRfiSenderIndex== null) {
            $newRfiSenderIndex = str_pad(1, 4, '0', STR_PAD_LEFT);
        } else {
            $newRfiSenderIndex = str_pad($currentRfiSenderIndex + 1, 4, '0', STR_PAD_LEFT);
        }


        $userOrganisation = auth()->user()->organisations->first();

        $rfi->number = sprintf(
            '%s-%s-RFI-%s',
            $projectAcronym,
            $userOrganisation->acronym,
            $newRfiSenderIndex
        );


        $rfi->sender_index = $newRfiSenderIndex;
        $rfi->project_acronym = $projectAcronym;
        $rfi->name = $this->rfiName;
        $rfi->status = 'open';

        $rfi->workpackage_id = $this->selectOptionWorkpackageId;          // this is stores user selection from dropdown list of options
        $rfi->user_id = $this->selectOptionCreatedById;
        $rfi->sender_organisation_id = $this->selectOptionSenderOrganisationId;
        $rfi->receiver_organisation_id = $this->selectOptionReceiverOrganisationId;
        $rfi->next_update_organisation_id = $this->selectOptionReceiverOrganisationId;
        $rfi->save();



        $message = new Message();
        $message->rfi_id = $rfi->id;
        $message->user_id = $rfi->user_id;
        $message->subject = '';
        $message->visibility = 'public';
        $message->body = $this->messageBody;
        $message->save();

        // Save uploaded files
        if ($this->fileUploads) {
            foreach ($this->fileUploads as $file) {
                $path = $file->store('public/rfi-files'); // Store the file in the 'rfi-files' directory
                // Create a new RFIFile model to associate with the RFI
                $attachment = new Attachment();
                $attachment->attachable_id = $message->id;
                $attachment->attachable_type = get_class($message);
                $attachment->filename = $file->getClientOriginalName();
                $attachment->filepath = $path;
                $attachment->save();
            }
        }

        $this->resetValidation();
        $this->emit('rfiUpdated');
        $this->showQuickEditRFIModal = false;           // trigger the modal to close through entanglement
    }

    public function btnCancelModal(){
        $this->nullAll();
        $this->resetValidation();
        $this->showQuickEditRFIModal = false;
    }

    public function render()
    {

        $project = $this->project;
        $workareas = $project->workareas;
        $organisations = Organisation::orderBy('name','asc')->get();
        $this->selectOptionCreatedById = auth()->user()->id;
        $users = User::orderBy('name','asc')->get();
        return view('livewire.requests-for-information', [
            'notification' => $this->notificationMsg,
            'organisations' => $organisations,
            'project' => $project,
            'users' => $users,
            'workareas' => $workareas,
        ]);
    }
}
