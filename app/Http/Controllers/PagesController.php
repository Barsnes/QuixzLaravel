<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class PagesController extends Controller
{

  public function home() {
    $articles = Article::get()->reverse();
    return view('index', ['articles' => $articles]);
  }

  public function about() {
    $about = DB::table('about')->select()->get()->get(0);

    return view("about")->with("about", $about);
  }

  public function contact() {
    return view('contact');
  }

  public function news() {
    $articles = Article::get()->reverse();
    return view('news.index', ['articles' => $articles]);

  }

  public function admin() {
    return view('admin.index');
  }

  public function downloads() {
    return view('downloads');
  }

}
