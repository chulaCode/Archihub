<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hire extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function jobs(){
        
        return $this->belongsToMany('App\jobs');
    }

}
