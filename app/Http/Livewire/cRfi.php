<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Rfi;
use Livewire\Component;
use App\Models\Workarea;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class cRfi extends Component
{
    public Rfi $rfi;
    public $projectNumber;
    public $notificationMsg;
    public $selectedRfi;
    public $messageBody;

    protected $listeners = [

        'rfiUpdated' => 'refreshComponent',
    ];

    public function nullAll() {
        $this->messageBody = null;
    }

    public function mount($rfiNumber) {
        $rfi = Rfi::where('number', $rfiNumber)->first();
        if($rfi) {
            $this->rfi = $rfi;
        } else {
            //TO DO: handle incorrect project number
        }
    }



    public function render()
    {
        $workarea_id = $this->rfi->workpackage->workarea_id;
        //dd($workarea_id);

        $workarea = Workarea::find($workarea_id);
        //dd($this->rfi->id);
        //dd(count($this->rfi->messages));
        return view('livewire.request-for-information', [
            'notification' => $this->notificationMsg,
            'project' => $workarea->project,
            'rfi' => $this->rfi
        ]);
    }

    public function refreshComponent() {
        $this->nullAll();
        $this->render();
    }


    public function btnSaveMessage() {


        $message = new Message();
        $message->subject = '';
        $message->body = $this->messageBody;
        $message->visibility = 'public';
        $message->rfi_id = $this->rfi->id;
        $message->user_id = auth()->user()->id;
        $message->save();
        $this->emit('rfiUpdated');
    }

}
