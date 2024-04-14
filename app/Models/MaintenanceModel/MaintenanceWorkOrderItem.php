<?php

namespace App\Models\MaintenanceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceWorkOrderItem extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_maintenance_work_order_item';
    protected $fillable = [
        'h3_m_task_id',
        'h3_m_inventory',
        'h3_items',
        'h3_quantity',
    ];
}
