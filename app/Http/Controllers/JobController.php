<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\User;
use App\jobs;
use App\clients;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['client','verified'],['except'=>array('index','show',
        'apply','saveJob','unsaveJob')]);
    }

    public function index()
    {

    }
    //storing job posted by client
    public function store(Request $request){
      
        $this->validate($request,[
           'title'=>'required','string', 'max:255',
           'category'=>'required',
           'desc'=>'required','string','min:50',
           'preference'=>'required',
           'duration'=>'required',
           'experience'=>'required',
           'salary'=>'required',
           'last_date' => 'required|date|after:today'
           
       ]);
    
       $id=auth()->user()->id;
       jobs::create([
           'user_id'=>$id,
           'categories_id'=>request('category'),
           'preference'=>request('preference'),
           'experience'=>request('experience'),
           'title'=>request('title'),
           'description'=>request('desc'),
           'duration'=>request('duration'),
           'salary'=>request('salary'),
           'last_date'=>request('last_date')    
       ]);
       return redirect()->route("client.index")->with('message','Job posted
       successfully');
   }
   public function apply(Request $request,$id)
   {
         $job_id=jobs::findOrFail($id);
         $date=$job_id->last_date;
         $date2=Carbon::parse($date);
         if($date2->isPast()){
           return redirect()->back()->with('message','Job Application 
           date has passed!');
         }
         $job_id->users()->attach(Auth::user()->id);
         return redirect()->back()->with('message','Application 
         sent Successful!');
     
   }
   public function saveJob($id)
   {
     $jobid=jobs::find($id);
     //attach and detach methods for many to many relationship
     $jobid->favorites()->attach(auth()->user()->id);
     return redirect()->back();
   }
   public function unsaveJob($id)
   {
     $jobid=jobs::findOrFail($id);
     $jobid->favorites()->detach(auth()->user()->id);
     return redirect()->back();
   }
   
}
