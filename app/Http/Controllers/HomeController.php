<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role = Auth::user()->role;
        // return view('home')->with('role', $role);
        return view('home');
    }
}
