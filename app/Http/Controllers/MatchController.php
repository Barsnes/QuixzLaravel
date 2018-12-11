<?php

namespace App\Http\Controllers;
use App\Match;
use App\Game;
use Auth;
use App\User;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct() {
      $this->middleware('admin');

    }

    public function index()
    {
      $matches = Match::orderBy('date', 'ASC')->get();;
      return view('admin.matches')->withMatches($matches);
    }

    public function create()
    {
      $games = Game::get();
      return view('matches.create')->withGames($games);
    }

    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:5|max:255',
          'game_id' => 'required|max:255',
          'enemy' => 'required|max:255',
          'quixzScore' => '',
          'enemyScore' => '',
          'enemyLogo' => '',
          'date' => 'required',
          'time' => '',
          'tournament_id' => '',
        ));

        // Store in DB
        $match = new Match;

        $match->name = $request->name;
        $match->game_id = $request->game_id;
        $match->enemy = $request->enemy;
        $match->enemyLogo = $request->enemyLogo;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->tournament_id = $request->tournament_id;

        $match->save();

        // Redirect
        return redirect()->route('matches.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $match = Match::find($id);
      $games = Game::get();

      return view('matches.edit', compact('match'))->withGames($games);
    }

    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:5|max:255',
          'game_id' => 'required|max:255',
          'enemy' => 'required|max:255',
          'quixzScore' => '',
          'enemyScore' => '',
          'enemyLogo' => '',
          'date' => 'required',
          'time' => '',
          'tournament_id' => '',
        ));

        // Store in DB
        $match = Match::find($id);

        $match->name = $request->name;
        $match->game_id = $request->game_id;
        $match->enemy = $request->enemy;
        $match->enemyLogo = $request->enemyLogo;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->tournament_id = $request->tournament_id;

        $match->save();

        return redirect('/admin/matches');
    }

    public function destroy($id)
    {
      Match::destroy($id);

      return redirect('/admin/matches');
    }
}
