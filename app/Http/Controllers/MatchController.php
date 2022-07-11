<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Auth;
use App\Models\User;
use Image;
use App\Models\Tournament;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
      $matches = Matches::orderBy('date', 'ASC')->get()->reverse();
      return view('admin.matches')->withMatches($matches);
    }

    public function create()
    {
      $teams = Team::get();
      $tournaments = Tournament::get();

      return view('matches.create')->withTeams($teams)->withTournaments($tournaments);
    }

    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:3|max:255',
          'enemy' => 'required|max:255',
          'quixzScore' => '',
          'enemyScore' => '',
          'enemyLogo' => 'image',
          'date' => 'required',
          'time' => '',
          'link' => '',
          'tournament_id' => 'required|integer',
        ));

        // Store in DB
        $match = new Matches;

        $match->name = $request->name;
        $match->enemy = $request->enemy;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->link = $request->link;
        $match->tournament_id = $request->tournament_id;

        $tournament = Tournament::find($request->tournament_id);

        $match->team_id = $tournament->team_id;

        if ($request->hasFile('enemyLogo')) {
          $enemyLogo = $request->file('enemyLogo');
          $info = getimagesize($enemyLogo);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($enemyLogo)->resize(300, 300)->save($location);

          $match->enemyLogo = $filename;
        }

        $match->save();

        // Redirect
        return redirect()->route('home');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $match = Matches::find($id);
      $teams = Team::get();
      $tournaments = Tournament::get();

      return view('matches.edit', compact('match'))->withTeams($teams)->withTournaments($tournaments);
    }

    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:3|max:255',
          'enemy' => 'required|max:255',
          'quixzScore' => '',
          'enemyScore' => '',
          'enemyLogo' => 'image',
          'date' => 'required',
          'time' => '',
          'tournament_id' => 'required|integer',
          'link' => '',
        ));

        // Store in DB
        $match = Matches::find($id);

        $match->name = $request->name;
        $match->enemy = $request->enemy;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->tournament_id = $request->tournament_id;
        $match->link = $request->link;

        if ($request->hasFile('enemyLogo')) {
          $enemyLogo = $request->file('enemyLogo');
          $info = getimagesize($enemyLogo);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($enemyLogo)->resize(300, 300)->save($location);

          $match->enemyLogo = $filename;
        }

        $match->save();

        return redirect('/admin');
    }

    public function destroy($id)
    {
      Matches::destroy($id);

      return redirect('/admin');
    }

    public function getMatch()
    {
      $match = Matches::orderBy('date', 'ASC')->first();
      return response(200, $match);
    }
}
