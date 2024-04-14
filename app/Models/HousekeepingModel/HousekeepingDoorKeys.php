<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingDoorKeys extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_housekeeping_doorlock_key';
    protected $fillable = [
        'key_UID',
        'key_user'
    ];

    public function doorLogs(){
        return $this->hasMany(HousekeepingDoorLogs::class, 'doorkey_id', 'id');
    }
}
