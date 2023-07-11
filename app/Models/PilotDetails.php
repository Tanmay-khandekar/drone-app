<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilotDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gov_license',
        'pilot_license',
        'other_licenses',
        'packages',
        'social_links',
        'license_category',
        'account_id',
    ];
}
