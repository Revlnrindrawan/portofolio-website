<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'institution',
        'location',
        'degree',
        'start_date',
        'end_date',
        'gpa',
        'sort_order',
    ];
}
