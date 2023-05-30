<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Privilege;

class cPrivileges extends Component
{

    protected $listeners = [

        'privilegesUpdated' => 'refreshComponent',
    ];

    public function editPrivilege($privilegeId, $userId, $crud, $grant) {

        $privilege = Privilege::findorFail($privilegeId);
        $user = User::findorFail($userId);

        if ($user->privileges->contains('id', $privilege->id)) {
            // Update the pivot table column value specified by $crud
            $pivotData = [$crud => $grant];
            $user->privileges()->updateExistingPivot($privilege->id, $pivotData);
        } else {
            // Attach the privilege to the user with the specified column value
            $pivotData = [$crud => $grant];
            $user->privileges()->attach($privilege->id, $pivotData);
        }
        $this->render();

    }

    public function render() {


        $privileges = auth()->user()->privileges();
        //dd($privileges);

        foreach(auth()->user()->privileges as $privilege){
            //dd($privilege->name);
        }

        return view('livewire.privileges', [
            //'notification' => $this->notificationMsg
        ]);
    }
    public function refreshComponent() {
        $this->render();
    }


}
