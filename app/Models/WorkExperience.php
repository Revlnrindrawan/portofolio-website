<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'location',
        'start_date',
        'end_date',
        'responsibilities',
        'type',
        'sort_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
    ];
}
