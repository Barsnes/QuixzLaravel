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
use App\Management;
use App\Game;
use App\Server;

class PagesController extends Controller
{

  public function home() {
    $articles = Article::get()->reverse();
    $matches = Match::orderBy('date', 'ASC')->get();;
    $matchesReverse = Match::orderBy('date', 'ASC')->get()->reverse();
    $teams = Team::get();
    $games = Game::get();
    $tournaments = Tournament::get();
    $index = DB::table('index')->where('id', '1')->get()->get(0);
    return view('index', ['articles' => $articles, 'matches' => $matches, 'matchesReverse' => $matchesReverse, 'teams' => $teams, 'tournaments' => $tournaments, 'index' => $index, 'games' => $games]);
  }

  public function about() {
    $about = DB::table('about')->select()->get()->get(0);
    $players = Management::get();

    return view("about")->with('about', $about)->withPlayers($players);
  }

  public function teams() {
    $teams = Team::get();
    $games = Game::get();
      
    return view("teams")->with("teams", $teams)->withGames($games);
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

  public function management(){
    $players = Management::get()->all();
    return view('management')->withPlayers($players);
  }

  public function getSingle($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $article = Article::where('slug', '=', $slug)->first();

    return view('news.show')->withArticle($article);

  }

  public function getPlayer($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $player = Player::where('playerName', '=', $slug)->first();
      
    if ($player->active) {
        return view('players.show')->withPlayer($player);
    } else {
        return redirect("/");
    }

  }

  public function getTeam($slug) {

    // $article = Article::where('created_at', '=', $year)->get();
    $team = Team::where('slug', '=', $slug)->first();

    if ($team->active == "1") {
        return view('teams.show')->withTeam($team);
    } else {
        return redirect("/");
    }

  }

  public function getTournament($slug){
    $tourn = Tournament::where('slug', '=', $slug)->first();

    return view('tournaments')->withTourn($tourn);
  }

  public function getManagementPerson($slug){
    $person = Management::where('slug', '=', $slug)->first();

    return view('management.show')->withPlayer($person);
  }

  // Show Servers
  public function servers(){
    $servers = Server::get();

    return view('servers.show')->withServers($servers);
  }

  public function tournaments(){
    $tournaments = Tournament::get()->reverse();

    return view('allTournaments')->withTournaments($tournaments);
  }

  public function policy_de(){
    return view('policy.privacy-policy-de');
  }

  public function statutes_de(){
    return view('policy.statutes');
  }

}
