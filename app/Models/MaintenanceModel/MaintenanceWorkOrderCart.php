<?php

namespace App\Models\MaintenanceModel;

use App\Models\InventoryModel\InventoryItems\MaintenanceInventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceWorkOrderCart extends Model
{
    use HasFactory;

    protected $table = 'hrms_h3_maintenance_work_order_cart';
    protected $fillable = [
        'h3_m_request_code',
        'h3_inventory_item_id',
        'h3_quantity'
    ];

    public function maintenanceInventory(): BelongsTo
    {
        return $this->belongsTo(MaintenanceInventory::class, 'h3_inventory_item_id', 'id');
    }
}
