<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBconnection extends Model
{
    use HasFactory;
    protected $connection = 'hotel2';
    protected $table = 'users';
}
