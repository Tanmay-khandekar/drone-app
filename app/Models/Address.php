<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'user_addresses';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'country',
        'state',
        'city',
    ];

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }

}
