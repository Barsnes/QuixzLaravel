<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

  public function home() {
    return view('index');
  }

  public function about() {
    $about = DB::table('about')->select()->get()->get(0);

    return view("about")->with("about", $about);
  }

  public function contact() {
    return view('contact');
  }

  public function news() {
    return view('news');
  }

  public function admin() {
    return view('admin.index');
  }

  public function downloads() {
    return view('downloads');
  }

}
