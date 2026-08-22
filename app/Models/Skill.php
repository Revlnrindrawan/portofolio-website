<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'name_id',
        'category',
        'group_name',
        'sort_order',
    ];
}
