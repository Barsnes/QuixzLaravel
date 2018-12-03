<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function home() {
    return view('index');
  }

  // public function about() {
  //   $about = DB::table('about')->all();
  //   return view('about', ['about' => $about]);
  // }

  public function contact() {
    return view('contact');
  }

  public function admin() {
    return view('admin.index');
  }

}
