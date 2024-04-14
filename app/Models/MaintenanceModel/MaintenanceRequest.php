<?php

namespace App\Models\MaintenanceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_maintenance_request';
    protected $fillable = [
        'h3_request_code',
        'h3_room_no',
        'h3_maintenance_request',
        'h3_additional_request',
        'h3_time_issue',
        'h3_status'
    ];
}
