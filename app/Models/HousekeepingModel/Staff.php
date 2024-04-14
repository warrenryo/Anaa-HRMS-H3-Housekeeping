<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'hrms_h3_housekeeping_staff';
    protected $fillable = [
        'h3_staff_code',
        'h3_staffName',
        'h3_email',
        'h3_position'
    ];
}
