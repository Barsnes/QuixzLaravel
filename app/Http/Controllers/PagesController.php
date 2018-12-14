<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use Auth;
use App\User;
use App\Match;
use App\Player;

class PagesController extends Controller
{

  public function home() {
    $articles = Article::get()->reverse();
    $matches = Match::orderBy('date', 'ASC')->get();;
    $matchesReverse = Match::orderBy('date', 'ASC')->get()->reverse();
    return view('index', ['articles' => $articles, 'matches' => $matches, 'matchesReverse' => $matchesReverse]);
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

  public function downloads() {
    return view('downloads');
  }

  public function getSingle($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $article = Article::where('slug', '=', $slug)->first();

      return view('news.show')->withArticle($article);

  }

  public function getPlayer($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $player = Player::where('playerName', '=', $slug)->first();

      return view('players.show')->withPlayer($player);

  }

}
