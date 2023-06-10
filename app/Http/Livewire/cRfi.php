<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Rfi;
use Livewire\Component;
use App\Models\Workarea;
class cRfi extends Component
{
    public Rfi $rfi;
    public $projectNumber;
    public $notificationMsg;
    public $selectedRfi;

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

}
