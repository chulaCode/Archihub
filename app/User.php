<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\profiles;
use App\clients;
use App\jobs;
use App\categories;
use App\Roles;
use App\images;
use App\hire;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(profiles::class);
    }
    public function client(){
        return $this->hasOne(clients::class);
    }
    public function category(){
        return $this->belongsToMany(categories::class);
    }
    public function jobs(){
        return $this->hasMany(jobs::class);
    }
    public function hire(){
        return $this->belongsToMany(jobs::class, 'hire',
        'user_id','jobs_id')->withTimeStamps();
    }

    public function image()
    {
        return $this->hasOne(images::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(jobs::class,'favourites',
        'user_id','jobs_id')->withTimeStamps();
    }
}
