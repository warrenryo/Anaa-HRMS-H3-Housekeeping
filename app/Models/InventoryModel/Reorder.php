<?php

namespace App\Models\InventoryModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reorder extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_reorder_points';
    protected $fillable = [
        'consumer',
        'item_id',
        'category',
        'item_name',
        'quantity',
        'status'
    ];
}
