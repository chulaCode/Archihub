<?php

namespace App;
use App\User;
use App\categories;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    protected $guarded=[];

    public function clients()
    {
        return $this->belongsTo('App\clients');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
    public function category()
    {
        return $this->hasOne('App\categories');
    }
}
