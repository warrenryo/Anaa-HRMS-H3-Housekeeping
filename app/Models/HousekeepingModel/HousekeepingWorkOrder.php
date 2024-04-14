<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Model;
use App\Models\HousekeepingModel\WorkOrderCart;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\HousekeepingModel\HousekeepingWorkOrderItem;

class HousekeepingWorkOrder extends Model
{
    //THIS IS MY HOUSEKEEPING PROGRESS / TASK PROGRESS MODEL
    use HasFactory;
    protected $table = 'hrms_h3_work_order_task';
    protected $fillable = [
        'h3_housekeeping_task_id',
        'h3_cart_items_id',
        'h3_housekeeper_code',
        'h3_housekeeper_name',
        'h3_room_no',
        'h3_scheduled_time',
        'h3_housekeeping_request',
        'h3_items_services',
        'h3_by_admin',
        'h3_additional_request',
        'h3_status'
    ];

    public function itemCart(): BelongsTo
    {
        return $this->belongsTo(WorkOrderCart::class, 'h3_cart_items_id', 'h3_h_request_code');
    }

    public function workOrderItem(){
        return $this->hasMany(HousekeepingWorkOrderItem::class, 'h3_task_id', 'id');
    }
}
