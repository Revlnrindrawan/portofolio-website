<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'role',
        'description',
        'technologies',
        'link',
        'sort_order',
    ];

    protected $casts = [
        'description' => 'array',
    ];
}
