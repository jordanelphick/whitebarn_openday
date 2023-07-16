<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Rfi;
use Livewire\Component;
use App\Models\Workarea;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class cRfi extends Component
{
    public Rfi $rfi;
    public $projectNumber;
    public $notificationMsg;
    public $selectedRfi;
    public $messageBody;
    public $showOptions = false;
    public $rolesSeleccionados;
    public $selectedUsers;
    public $searchUsers;
    public $search;
    public $showUserSearchResults = false;

    protected $listeners = [

        'rfiUpdated' => 'refreshComponent',
    ];

    public function nullAll() {
        $this->messageBody = null;
    }

    public function mount($rfiNumber) {
        $rolesSeleccionados = User::all();
        $rfi = Rfi::where('number', $rfiNumber)->first();
        if($rfi) {
            $this->rfi = $rfi;
        } else {
            //TO DO: handle incorrect project number
        }
    }


    public function searchUsers()
    {
        try {
            if ($this->search === null) {
                $this->showUserSearchResults = false;
            } else {
                $existingUserIds = $this->rfi->users->pluck('id')->toArray();
                $userResults = User::where('name', 'like', '%' . $this->search . '%')
                    ->whereNotIn('id', $existingUserIds)
                    ->get();

                if (count($userResults) > 0) {
                    $this->usersList = $userResults;
                    $this->showUserSearchResults = true;
                } else {
                    $this->usersList = [['id' => '-', 'name' => 'No results']];
                    $this->showUserSearchResults = true;
                }
            }
        } catch (\Throwable $e) {
            // Handle the error gracefully
            $this->showUserSearchResults = false;
            // Log or handle the error in a way that suits your needs
            \Log::error($e->getMessage());
        }
    }

    public function render()
    {
        $workarea_id = $this->rfi->workpackage->workarea_id;
        //dd($workarea_id);
        $this->selectedUsers = User::all();
        $workarea = Workarea::find($workarea_id);
        //dd($this->rfi->id);
        //dd(count($this->rfi->messages));
        return view('livewire.request-for-information', [
            'notification' => $this->notificationMsg,
            'project' => $workarea->project,
            'rfi' => $this->rfi,
            'users' => User::all(),
            'showOptions' => $this->showOptions,
            'usersList' => $this->selectedUsers,
            'showUserSearchResults' => $this->showUserSearchResults,
        ]);
    }

    public function refreshComponent() {
        $this->nullAll();
        $this->render();
    }

    public function addUser($userId)
    {
        $user = User::find($userId);

        if ($user && !$this->rfi->users->contains($user)) {
            $this->rfi->users()->attach($user);
            // Or, if the relationship is many-to-many and you want to sync the users:
            // $this->rfi->users()->syncWithoutDetaching([$user->id]);
        }

        // You can perform any additional actions or emit events as needed.

        // Refresh the RFI model to reflect the updated users.
        $this->rfi = $this->rfi->fresh();
        $this->search = '';
        $this->showUserSearchResults = false;
        $this->refreshComponent();
    }

    public function removeUser($userId)
    {
        $user = User::find($userId);

        if ($user && $this->rfi->users->contains($user)) {
            $this->rfi->users()->detach($user);
            // Or, if the relationship is many-to-many and you want to sync the users:
            // $this->rfi->users()->detach([$user->id]);
        }

        // You can perform any additional actions or emit events as needed.

        // Refresh the RFI model to reflect the updated users.
        $this->rfi = $this->rfi->fresh();
        $this->search = '';
        $this->showUserSearchResults = false;
        $this->refreshComponent();
    }

    public function btnOptionsToggle(){

        if ($this->showOptions == true) {
            $this->showOptions = false;
        } else {
            $this->showOptions = true;
        }
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
