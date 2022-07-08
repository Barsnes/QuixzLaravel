<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Match;
use App\Models\Player;
use App\Models\Team;
use App\Models\Tournament;

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
