<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\clients;
use App\agents;

class RegistrationController extends Controller
{
    public function agency()
    {
      return view("auth.agencyRegister");
    }

    public function client()
    {
        return view("auth.clientRegister");
    }

    public function post(Request $request)
    {//agency

        $this->validate($request,[
            'name'=>'required|string|max:255',
            'username'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:users',
            'password'=>'required|string|min:5|confirmed'
          ]);
          $user= User::create([
              'name'=>request('name'),
              'username'=>request('username'),
              'email' => request('email'),
              'user_type'=>request('user_type'),
              'password' => Hash::make(request('password')),
          ]);
          profiles::create([
            'user_id'=>$user->id,
        ]);
        return $user;
        
          return redirect()->back()->with('message','please
      verify your email by clicking the link sent to your email address!');
      
    }


    public function store(Request $request)
    {
       // dd(request('name'),request('email'),request('user_type'),request('address'),request('state'),request('phone'));
        //client
        $this->validate($request,[
            'phone'=>'required|min:11',
            'name'=>'required|string|max:255',
            'username'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'state'=>'required|string',
            'email'=>'required|string|max:255|email|unique:users',
            'password'=>'required|string|min:5|confirmed'
          ]);
          
          $user= User::create([
              'name'=>request('name'),
              'username'=>request('username'),
              'email' => request('email'),
              'user_type'=>request('user_type'),
              'password' => Hash::make(request('password')),
          ]);
       
          clients::create([
            'user_id'=>$user->id,
            'address'=>request('address'),
            'state'=>request('state'),
            'phone'=>request('phone'),
        ]);
        
         $user->sendEmailVerificationNotification();
          return redirect()->back()->with('status','please
      verify your email by clicking the link sent to your email address!');
      
    }
    public function agency_names(Request $request)
    {
      $names=request('name');
      $email=request('email');
      $number=count($names);
      if($number>0){
          for($i=0;$i<$number;$i++){
            $agent= agents::create([
                'name'=>$names[$i],
                'email' => $email[$i],
               
            ]);
          }
        return redirect()->route("agency")->with("status","The names of agency members have been saved you can now proceed with the registration.");
      }
    }
}
