<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'address',
        'capacity',
        'description',
        'open_time',
        'close_time',
        'coworking_price',
        'meeting_price',
        'admin_id'
    ];
}
