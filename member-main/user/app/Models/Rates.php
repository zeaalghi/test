<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;
    protected $table = 'rates';
    protected $fillable = [
        'departure_id',
        'arrive_id',
        'rate'
    ];

    public function departures()
    {
        return $this->belongsTo(Destinations::class, 'departure_id');
    }

    public function arrivals()
    {
        return $this->belongsTo(Destinations::class, 'arrive_id');
    }
}
