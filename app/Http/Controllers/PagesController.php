<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Article;
use App\User;
use App\Match;
use App\Player;
use App\Team;
use App\Tournament;

class PagesController extends Controller
{

  public function home() {
    $articles = Article::get()->reverse();
    $matches = Match::orderBy('date', 'ASC')->get();;
    $matchesReverse = Match::orderBy('date', 'ASC')->get()->reverse();
    $teams = Team::get();
    $tournaments = Tournament::get();
    return view('index', ['articles' => $articles, 'matches' => $matches, 'matchesReverse' => $matchesReverse, 'teams' => $teams, 'tournaments' => $tournaments]);
  }

  public function about() {
    $about = DB::table('about')->select()->get()->get(0);

    return view("about")->with("about", $about);
  }

  public function teams() {
    $teams = Team::get();

    return view("teams")->with("teams", $teams);
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

  public function getTeam($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $team = Team::where('slug', '=', $slug)->first();

    return view('teams.show')->withTeam($team);

  }

}
