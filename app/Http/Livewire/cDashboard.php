<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class cDashboard extends Component
{
    public Project $project;
    public $projectNumber;
    public $notificationMsg;

    public function mount($projectNumber)
    {

        $project = Project::where('number', $projectNumber)->first();
        if($project) {
            $this->project = $project;

        } else {
            //TO DO: handle incorrect project number
        }
    }

    public function render()
    {

        return view('livewire.dashboard', [
            'notification' => $this->notificationMsg,
            'project' => Project::where('number',$this->projectNumber)->first()
        ]);

    }
}
