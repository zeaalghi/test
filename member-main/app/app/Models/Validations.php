<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validations extends Model
{
    use HasFactory;
    protected $table = 'validation';
    protected $fillable = [
        'drivers_id',
        'field',
        'old_value',
        'new_value',
    ];

    public function drivers()
    {
        return $this->belongsTo(Drivers::class);
    }
}
