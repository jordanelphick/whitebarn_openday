<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\Project;


class cProjects extends Component
{
    public $search = '';
    public $sortField = 'number';
    public $sortDirection = 'asc';

    //protected $queryString = ['sortField', 'sortDirection'];

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
       return view('livewire.projects', [
            'projects' => Project::orderBy($this->sortField,$this->sortDirection)->get()
        ]);

        /* Code below utilises ::search (Laravel Scout) funcitonality, which is not currently implemented / nor required.
        return view('livewire.projects', [
             'projects' => Project::search('number', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(100),
         ]); */


    }
}
