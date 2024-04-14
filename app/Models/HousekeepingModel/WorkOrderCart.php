<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;

class WorkOrderCart extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_cart_items_work_order';
    protected $fillable = [
        'h3_h_request_code',
        'h3_inventory_item_id',
        'h3_quantity'
    ];

    public function inventoryItem(): BelongsTo
    {
        return $this->belongsTo(HousekeepingInventory::class, 'h3_inventory_item_id', 'id');
    }
}
