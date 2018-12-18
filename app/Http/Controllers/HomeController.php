<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Article;
use App\Match;
use App\Player;
use App\Team;
use App\Tournament;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
      $articles = Article::get()->reverse();
      $matches = Match::orderBy('date', 'ASC')->get();;
      $teams = Team::get();
      $players = Player::get();
      $tournaments = Tournament::get();
      return view('home', ['articles' => $articles, 'matches' => $matches, 'teams' => $teams, 'players' => $players, 'tournaments' => $tournaments]);
    }
}
