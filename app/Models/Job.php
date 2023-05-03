<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'location',
        'county',
        'city',
        'type',
        'job_desc',
        'start_date',
        'end_date',
    ];

    public function country()
    {
        return $this->hasOne('App\Models\Countries', 'id', 'location');
    }

    public function county()
    {
        return $this->hasOne('App\Models\States', 'id', 'county');
    }
    
    public function city()
    {
        return $this->hasOne('App\Models\Cities', 'id', 'city');
    }

    public function bids()
    {
        return $this->hasMany('App\Models\Bids', 'job_id');
    }
}
