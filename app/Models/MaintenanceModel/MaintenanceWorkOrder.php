<?php

namespace App\Models\MaintenanceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceWorkOrder extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_maintenance_work_order';
    protected $fillable = [
        'h3_maintenance_task_id',
        'h3_maintenance_staff_code',
        'h3_maintenance_staff_name',
        'h3_scheduled_time',
        'h3_room_no',
        'h3_maintenance_request',
        'h3_additional_request',
        'h3_status'
    ];

    public function mWorkOrderItem()
    {
        return $this->hasMany(MaintenanceWorkOrderItem::class, 'h3_m_task_id', 'id');
    }
}
