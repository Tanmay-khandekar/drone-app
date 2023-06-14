<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'customer_id',
        'pilot_id',
        'amount',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\User', 'id', 'customer_id');
    }

    public function pilot()
    {
        return $this->hasOne('App\Models\User', 'id', 'pilot_id');
    }
}
