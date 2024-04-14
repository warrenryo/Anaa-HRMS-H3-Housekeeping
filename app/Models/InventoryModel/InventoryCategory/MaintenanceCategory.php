<?php

namespace App\Models\InventoryModel\InventoryCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceCategory extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_m_inventory_category';
    protected $fillable = [
        'h3_m_category'
    ];
}
