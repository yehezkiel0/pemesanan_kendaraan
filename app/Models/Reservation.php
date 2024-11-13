<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'vehicle_type',
        'driver',
        'requester',
        'approver_level_1',
        'approver_level_2',
        'reservation_date',
    ];
}
