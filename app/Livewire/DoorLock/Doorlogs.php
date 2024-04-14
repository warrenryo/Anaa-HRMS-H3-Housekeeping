<?php

namespace App\Livewire\DoorLock;

use App\Models\DoorLockModel\DoorLockLogs;
use Livewire\Component;
use Livewire\WithPagination;

class Doorlogs extends Component
{
    use WithPagination;
    public $doorKey;

    public function render()
    {
        $logs = DoorLockLogs::where('h3_doorLockUID', $this->doorKey)->orderBy('id', 'DESC')->paginate(5);

        return view('livewire.door-lock.doorlogs', [
            'logs' => $logs
        ]);
    }
}
