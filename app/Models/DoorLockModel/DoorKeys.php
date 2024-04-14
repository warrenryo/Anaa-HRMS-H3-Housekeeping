<?php

namespace App\Models\DoorLockModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorKeys extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_door_key';
    protected $fillable = [
        'h3_door_key_uid',
        'h3_room_no'
    ];
}
