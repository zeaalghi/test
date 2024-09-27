<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $fillable = [
        'user_id',
        'memberbatch',
        'memberid',
        'idcard',
        'fullname',
        'gender',
        'birthloc',
        'birthdate',
        'phone',
        'address',
        'lisence',
        'insurance',
        'status',
        'created_at',
        'updated_at',
    ];

    public function images()
    {
        return $this->hasMany(Images::class, 'driverid');
    }

    public function validations()
    {
        return $this->hasMany(Validations::class);
    }

    public function armada()
    {
        return $this->hasMany(Fleets::class);
    }
}
