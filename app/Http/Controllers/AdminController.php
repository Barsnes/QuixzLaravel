<?php

namespace App\Http\Controllers;
use Auth;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');
  }

  public function index()
  {
    return view('home');
  }

  public function users() {

    $users = User::all();
    return view('admin.users')->withUsers($users);
    // dd($users);
  }
}
