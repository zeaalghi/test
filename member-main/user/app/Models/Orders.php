<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'users_id',
        'truck_fleets_id',
        'order_type',
        'payload',
        'payload_weight',
        'delivery_destination',
        'pickup_location',
        'price',
        'negotiation',
        'status',
        'note',
        'order_date'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function fleets()
    {
        return $this->belongsTo(Fleets::class, 'truck_fleets_id');
    }

    public function transactions()
    {
        return $this->hasOne(Transactions::class);
    }

    public function pickup_destination()
    {
        return $this->belongsTo(Destinations::class, 'pickup_location');
    }

    public function delivery()
    {
        return $this->belongsTo(Destinations::class, 'delivery_destination');
    }
}
