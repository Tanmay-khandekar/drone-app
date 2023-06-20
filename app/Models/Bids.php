<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;
    protected $table='bids';
    protected $fillable = [
        'job_id',
        'type',
        'start_date',
        'end_date',
        'bid_desc',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
