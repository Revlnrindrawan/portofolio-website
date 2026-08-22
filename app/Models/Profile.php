<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'title',
        'title_id',
        'bio',
        'bio_id',
        'email',
        'phone',
        'linkedin',
        'github',
        'photo',
        'about_photo',
    ];
}
