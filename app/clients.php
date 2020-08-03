<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $guarded=[];

    public function jobs()
    {
        return $this->hasMany('App\jobs');
    }
}
