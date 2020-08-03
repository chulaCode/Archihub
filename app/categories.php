<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\jobs;
use App\User;

class categories extends Model
{
    public function jobs(){
    	return $this->hasMany(jobs::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('email');
    }
}
