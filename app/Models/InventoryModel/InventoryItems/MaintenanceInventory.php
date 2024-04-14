<?php

namespace App\Models\InventoryModel\InventoryItems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceInventory extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_m_inventory';
    protected $fillable = [
        'h3_category',
        'h3_item_name',
        'h3_quantity'
    ];
}
