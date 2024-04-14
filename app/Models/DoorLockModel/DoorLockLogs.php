<?php

namespace App\Models\DoorLockModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorLockLogs extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_door_lock_logs';
    protected $fillable = [
        'h3_doorLockUID'
    ];
}
