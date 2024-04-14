<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingDoorLogs extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_housekeeping_doorlogs';
    protected $fillable = [
        'doorkey_id',
        'key_UID',
        'room_no'
    ];

    public function doorUsers(){
        return $this->belongsTo(HousekeepingDoorKeys::class, 'doorkey_id', 'id');
    }
}
