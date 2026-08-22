<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'title_id',
        'role',
        'role_id',
        'description',
        'description_id',
        'technologies',
        'link',
        'sort_order',
    ];

    protected $casts = [
        'description' => 'array',
        'description_id' => 'array',
    ];
}
