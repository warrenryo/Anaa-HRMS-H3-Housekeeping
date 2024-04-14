<?php

namespace App\Models\ActivityLogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_activity_logs';
    protected $fillable = [
        'h3_activities',
        'h3_log_type'
    ];
}
