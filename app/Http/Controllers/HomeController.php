<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Article;
use App\Match;
use App\Player;
use App\Team;

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
      $articles = Article::get()->reverse();
      $matches = Match::orderBy('date', 'ASC')->get();;
      $teams = Team::get();
      $players = Player::get();
      return view('home', ['articles' => $articles, 'matches' => $matches, 'teams' => $teams, 'players' => $players]);
    }
}
