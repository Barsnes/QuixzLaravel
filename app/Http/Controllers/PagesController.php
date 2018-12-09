<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use Auth;
use App\User;

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

  public function getSingle($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $article = Article::where('slug', '=', $slug)->first();

    if( Auth::check() ){
        $role = Auth::user()->role;
        return view('news.show')->withArticle($article)->withRole($role);
      }
      else{
          return view('news.show')->withArticle($article)->withRole('');
      }

  }

}
