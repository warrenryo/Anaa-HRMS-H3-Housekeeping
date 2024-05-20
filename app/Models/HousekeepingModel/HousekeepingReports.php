<?php

namespace App\Models\HousekeepingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingReports extends Model
{
    use HasFactory;
    protected $table = 'h3_housekeeper_reports';
    protected $fillable = [
        'h3_housekeeper',
        'h3_report_type',
        'h3_specify'
    ];
}
