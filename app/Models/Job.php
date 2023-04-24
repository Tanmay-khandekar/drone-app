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
        'country',
        'county',
        'type',
        'job_desc',
        'start_date',
        'end_date',
    ];
}
