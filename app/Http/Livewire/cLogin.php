<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class cLogin extends Component
{
    public $emailAddress;
    public $userId;
    public $userName;
    public $partnerName;
    public $mobile;
    public $selectAttending;
    public $selectTicketQty;
    public $showThankYouMessage = false;

    public User $user;

    public function mount()
    {
        //$this->userId = null;
    }

    public function rules()
    {
        return [
            'emailAddress' => 'required',
            'userName' => 'required',
            'partnerName' => 'required',
            'mobile' => 'required|regex:/^04\d{8}$/',
            'selectAttending' => 'required',
            'selectTicketQty' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'emailAddress.required' => 'The Email Address field is required.',
            'userName.required' => 'The Name field is required.',
            'partnerName.required' => 'The Partner Name field is required.',
            'mobile.required' => 'The Mobile field is required.',
            'selectAttending.required' => 'The Attending field is required.',
            'selectTicketQty.required' => 'The Ticket Quantity field is required.',

        ];
    }

    public function render()
    {

        if ($this->userId === null) {
            return view('whitebarn.openday.login');
        } elseif ($this->showThankYouMessage) {

            if($this->user->attending=='yes'){
                return view('whitebarn.openday.thankyou', [
                    'user' => $this->user
                ]);
            } else {
                return view('whitebarn.openday.not-attending', [
                    'user' => $this->user
                ]);
            }


        } else {
            return view('whitebarn.openday.confirmation', [
                'user' => $this->user
            ]);
        }
    }

    public function btnLogin()
    {

        $this->validateOnly('emailAddress', $this->rules());

        $user = User::where('email', $this->emailAddress)->first();

        if ($user) {
            dd($user->name);
            $this->user = $user;
            $this->userId = $user->id;
            $this->userName = $user->name;
            $this->partnerName = $user->partner_name;
            $this->mobile = $user->mobile;
            $this->selectTicketQty = $user->open_day_ticket_qty;
            $this->selectAttending = $user->attending;
        } else {
            // Handle invalid user login here if needed.
            // For example, you can add a validation error message.
            $this->addError('emailAddress', 'Invalid email address.');
        }
    }

    public function btnSave(){
        $this->validate();

        $user = User::find($this->userId);

        $user->name = $this->userName;
        $user->partner_name = $this->partnerName;
        $user->open_day_ticket_qty = $this->selectTicketQty;
        $user->attending = $this->selectAttending;
        $user->mobile = $this->mobile;
        $user->save();
        $this->user = $user;

        $this->showThankYouMessage = true;

    }
}
