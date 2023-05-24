<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;
    protected $table='bids';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
