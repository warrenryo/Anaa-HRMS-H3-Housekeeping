<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingWorkOrderItem extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_work_order_task_item';
    protected $fillable = [
        'h3_task_id',
        'h3_h_inventory_id',
        'h3_items',
        'h3_quantity'
    ];

 

}
