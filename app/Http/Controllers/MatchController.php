<?php

namespace App\Http\Controllers;
use App\Match;
use App\Team;
use Auth;
use App\User;
use Image;
use App\Tournament;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
      $matches = Match::orderBy('date', 'ASC')->get()->reverse();
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
          'team_id' => 'required|max:255',
          'enemy' => 'required|max:255',
          'quixzScore' => '',
          'enemyScore' => '',
          'enemyLogo' => 'image',
          'date' => 'required',
          'time' => '',
          'link' => '',
        ));

        // Store in DB
        $match = new Match;

        $match->name = $request->name;
        $match->team_id = $request->team_id;
        $match->enemy = $request->enemy;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->link = $request->link;

        if ($request->hasFile('enemyLogo')) {
          $enemyLogo = $request->file('enemyLogo');
          $info = getimagesize($enemyLogo);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($enemyLogo)->resize(50, 50)->save($location);

          $match->enemyLogo = $filename;
        }

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
      $teams = Team::get();

      return view('matches.edit', compact('match'))->withTeams($teams);
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
          'tournament_id' => '',
          'link' => '',
        ));

        // Store in DB
        $match = Match::find($id);

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
          Image::make($enemyLogo)->resize(150, 150)->save($location);

          $match->enemyLogo = $filename;
        }

        $match->save();

        return redirect('/admin/matches');
    }

    public function destroy($id)
    {
      Match::destroy($id);

      return redirect('/admin/matches');
    }
}
