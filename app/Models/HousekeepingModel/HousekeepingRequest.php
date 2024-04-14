<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingRequest extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_housekeeping_requests';
    protected $fillable = [
        'h3_request_code',
        'h3_room_no',
        'h3_housekeeping_request',
        'h3_items_services',
        'h3_additional_request',
        'h3_time_issue',
        'status'
    ];
}
