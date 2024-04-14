<?php

namespace App\Models\MaintenanceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStaff extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_maintenance_staff';
    protected $fillable = [
        'h3_staff_code',
        'h3_staff_name',
        'h3_email',
        'h3_position'
    ];
}
