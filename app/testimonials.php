<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    protected $fillable = [
        'name', 'profession', 'video_id',
    ];

}
