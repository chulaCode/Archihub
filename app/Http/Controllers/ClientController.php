<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['client','verified']);
    }

    public function index(Request $request)
    {
        return view("client.client");
    }
    public function postJob(Request $request)
    {
        return view("client.PostJob");
    }
}
