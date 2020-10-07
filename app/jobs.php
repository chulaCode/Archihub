<?php

namespace App;
use App\User;
use App\categories;
use App\hire;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    protected $guarded=[];

   
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimeStamps();
    }
    public function category()
    {
        return $this->hasOne('App\categories');
    }
    public function hire(){
        return $this->hasMany(hire::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(jobs::class,'favourites',
        'jobs_id','user_id')->withTimeStamps();
    }
    public function checkApplication()
    {
      return \DB::table('jobs_user')->where([['user_id',auth()->user()->id],
      ['jobs_id',$this->id]])->exists(); 
    }
    public function checkSaved()
    {
      return \DB::table('favourites')->where([['user_id',auth()->user()->id],
      ['jobs_id',$this->id]])->exists(); 
    }
    public function checkHire()
    {
      $count= \DB::table('hire')->where([['user_id',auth()->user()->id],
      ['jobs_id',$this->id]])->get(); 
      if($count->count()>2)
         {

         }
    }
}
