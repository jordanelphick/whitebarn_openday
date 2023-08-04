<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Component\table;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class cHiddenDashboard extends Component
{
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }


    public function render()
    {
        $totalQuantities = DB::table('users')
            ->where('attending', 'yes')
            ->sum('open_day_ticket_qty');



        return view('whitebarn/openday/hidden-dashboard',[
            'users' => User::orderBy($this->sortField, $this->sortDirection)->get(),
            'total_attending' => $totalQuantities
        ]);
    }


}



