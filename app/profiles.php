<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    //protected $guarded=[];
    protected $fillable = [
        'user_id', 'address', 'state','bio','avatar','job_field',
        'phone','ceerticate','resume','cover_letter','experience'
    ];
}
