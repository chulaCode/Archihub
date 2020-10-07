<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $guarded=[];
    
    public function getRouteKeyName()
    {
        return 'username';
    }

}
