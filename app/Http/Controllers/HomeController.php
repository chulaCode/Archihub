<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\agents;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
       if(auth::user()->user_type=='architect')
       { 
        return redirect()->route('architect.index');
       }
       elseif(auth::user()->user_type=='agency')
       {
        return redirect()->route('agency.index');
       }
       elseif(auth::user()->user_type=='client')
       {
        return redirect()->route('client.index');
       }
    }
  
}
