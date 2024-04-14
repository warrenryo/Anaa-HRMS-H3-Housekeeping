<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $user, $date;

    public function mount($user, $date){
        $this->user = $user;
        $this->date = $date;
    }
    public function render()
    {
        return view('livewire.notification' , [
            'user' => $this->user,
            'date' => $this->date
        ]);
    }
}
