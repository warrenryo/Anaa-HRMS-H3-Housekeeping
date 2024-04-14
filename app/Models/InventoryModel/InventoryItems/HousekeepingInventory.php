<?php

namespace App\Models\InventoryModel\InventoryItems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingInventory extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_h_inventory_items';
    protected $fillable = [
        'h3_category_name',
        'h3_item_name',
        'h3_quantity',
        'h3_status'
    ];
}
