<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'position_id',
        'location',
        'start_date',
        'end_date',
        'responsibilities',
        'responsibilities_id',
        'photo',
        'type',
        'sort_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'responsibilities_id' => 'array',
    ];
}
