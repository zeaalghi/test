<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleets extends Model
{
    use HasFactory;
    protected $table = 'truck_fleets';
    protected $fillable = [
        'drivers_id',
        'capacity',
        'order_type',
        'loaded_capacity',
        'destinations_id',
        'departure_date',
        'arrival_date',
        'status'
    ];

    public function drivers()
    {
        return $this->belongsTo(Drivers::class);
    }

    public function destinations()
    {
        return $this->belongsTo(Destinations::class, 'destinations_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'truck_fleets_id');
    }
}
