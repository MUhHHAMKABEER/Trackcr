<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'imei',
        'model',
        'event_status',
        'battery_voltage',
        'utc_time',
        'gps_status',
        'latitude',
        'longitude',
        'date',
        'received_at',
    ];

    protected $casts = [
        'battery_voltage' => 'float',
        'received_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
