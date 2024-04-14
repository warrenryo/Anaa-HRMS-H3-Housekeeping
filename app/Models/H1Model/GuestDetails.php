<?php

namespace App\Models\H1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestDetails extends Model
{
    use HasFactory;

    protected $table = 'hrms_h3_guest_details';
    protected $fillable = [
        'guest_id',
        'room_no'
    ];
}
