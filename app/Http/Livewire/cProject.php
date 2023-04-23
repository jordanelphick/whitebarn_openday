<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;


class cProject extends Component
{
    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';

    //protected $queryString = ['sortField', 'sortDirection'];

    public $projectId;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
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

       return view('livewire.project', [
            'project' => Project::find($this->projectId)
        ]);

        /* return view('livewire.projects', [
             'projects' => Project::search('number', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(100),
         ]); */


    }
}
