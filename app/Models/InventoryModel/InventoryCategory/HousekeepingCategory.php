<?php

namespace App\Models\InventoryModel\InventoryCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingCategory extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_h_inventory_category';
    protected $fillable = [
        'h3_h_category'
    ];
}
