<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = [
        'city',
        'island'
    ];

    public function fleets()
    {
        return $this->hasMany(Fleets::class, 'destinations_id');
    }

    public function departures()
    {
        return $this->hasMany(Rates::class, 'departure_id');
    }

    public function arrivals()
    {
        return $this->hasMany(Rates::class, 'arrive_id');
    }

    public function orders_pickup()
    {
        return $this->hasMany(Orders::class, 'pickup_location');
    }

    public function orders_delivery()
    {
        return $this->hasMany(Orders::class, 'delivery_destination');
    }
}
