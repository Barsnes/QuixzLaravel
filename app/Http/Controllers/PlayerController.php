<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Player;
use Auth;
use App\User;
use Image;
use App\Team;

class PlayerController extends Controller
{

    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
      $players = Player::get();
      return view('admin.players')->withPlayers($players);
    }

    public function create()
    {
      $teams = Team::get();
      return view('players.create')->withTeams($teams);
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'firstName' => 'required|max:20',
          'playerName' => 'required|max:20|unique:players,playerName',
          'lastName' => 'required|max:20',
          'image' => 'image',
          'body' => '',
          'active' => 'required',
          'team_id' => 'required|max:20|integer',
          'nationality' => '',
          'role' => '',
        ));

        // Store in DB
        $player = new Player;

        $player->firstName = $request->firstName;
        $player->playerName = $request->playerName;
        $player->lastName = $request->lastName;
        $player->image = 'avatar.png';
        $player->body = $request->body;
        $player->steam = $request->steam;
        $player->instagram = $request->instagram;
        $player->twitter = $request->twitter;
        $player->youtube = $request->youtube;
        $player->twitch = $request->twitch;
        $player->active = $request->active;
        $player->team_id = $request->team_id;
        $player->nationality = strtolower($request->nationality);
        $player->role = $request->role;


        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(500, 500)->save($location);

          $player->image = $filename;
        }

        $player->save();

        // Redirect
        return redirect()->route('players.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $player = Player::find($id);
      $teams = Team::get();

      return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, $id)
    {

      $player = Player::find($id);

      if ((Auth::user()->role == 'Player' && Auth::user()->player->id == $player->id) || Auth::user()->role == 'Admin') {
        $this->validate($request, array(
            'firstName' => 'required|max:20',
            'playerName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'image' => 'image',
            'body' => '',
            'active' => 'required',
            'team_id' => '',
            'nationality' => '',
            'role' => '',
          ));

          // Store in DB
          $player = Player::find($id);

          $player->firstName = $request->firstName;
          $player->playerName = $request->playerName;
          $player->lastName = $request->lastName;
          $player->body = $request->body;
          $player->steam = $request->steam;
          $player->instagram = $request->instagram;
          $player->twitter = $request->twitter;
          $player->youtube = $request->youtube;
          $player->twitch = $request->twitch;
          $player->active = $request->active;
          $player->nationality = strtolower($request->nationality);
          $player->role = $request->role;


          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $info = getimagesize($image);
            $extension = image_type_to_extension($info[2]);
            $filename = time() . $extension;
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(500, 500)->save($location);

            $player->image = $filename;
          }

          $player->save();

          return back();
      } else {
        return back();
      }

    }

    public function destroy($id)
    {

      if ( Auth::user()->role != 'Admin') {
        return redirect('/');
      }

      if (Auth::user()->role == 'Admin') {
        Player::destroy($id);

        return redirect('/admin/players');
      }
  }
}
