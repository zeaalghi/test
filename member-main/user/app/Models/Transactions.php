<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'orders_id',
        'depositor_name',
        'bank',
        'nominal',
        'filepath'
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
