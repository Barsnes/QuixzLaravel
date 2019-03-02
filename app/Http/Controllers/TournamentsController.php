<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Player;
use Auth;
use App\User;
use Image;
use App\Team;
use App\Tournament;
use App\TournamentMatch;
use App\Sponsor;


class TournamentsController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

    public function index()
    {
      $tournaments = Tournament::get();
      return view('admin.tournaments')->withTournaments($tournaments);
    }

    public function create()
    {
      $teams = Team::get();
      return view('tournaments.create')->withTeams($teams);
    }

    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:5|max:255|unique:tournaments,name',
          'image' => 'image',
          'team_id' => 'required',
          'date' => 'required',
          'time' => '',
          'format' => '',
          'link' => '',
          'finished' => '',
        ));

        // Store in DB
        $tourn = new Tournament;

        $tourn->name = $request->name;
        $tourn->team_id = $request->team_id;
        $tourn->date = $request->date;
        $tourn->time = $request->time;
        $tourn->format = $request->format;
        $tourn->link = $request->link;
        if (isset($request->finished)) {
          $tourn->finished = $request->finished;
        };

        $value = $tourn->name;
        $tourn->slug = str_slug($value);

if ($request->hasFile('image')) {
        // image
        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time() . $extension;
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(300, 300)->save($location);

        $tourn->image = $filename;
      }
        $tourn->save();

        // Redirect
        return redirect()->route('home');
    }

    public function show($id)
    {
      $tournament = Tournament::find($id);
      return view('tournaments.show')->withTournament($tournament);
    }

    public function edit($id)
    {
      $tournament = Tournament::find($id);
      return view('tournaments.edit')->withTournament($tournament);
    }

    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'name' => 'required|min:5|max:255',
          'image' => 'image',
          'team_id' => 'required',
          'date' => 'required',
          'time' => '',
          'format' => '',
          'link' => '',
        ));

        // Store in DB
        $tourn = Tournament::find($id);

        $tourn->name = $request->name;
        $tourn->team_id = $request->team_id;
        $tourn->date = $request->date;
        $tourn->time = $request->time;
        $tourn->format = $request->format;
        $tourn->link = $request->link;


        $value = $tourn->name;
        $tourn->slug = str_slug($value);

if ($request->hasFile('image')) {
        // image
        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time() . $extension;
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(300, 300)->save($location);

        $tourn->image = $filename;
      }
        $tourn->save();

        // Redirect
        return redirect()->route('home');
    }

    public function destroy($id)
    {
      Tournament::destroy($id);
      return redirect()->route('home');
    }
}
