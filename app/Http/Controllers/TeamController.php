<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Game;
use App\Player;
use Auth;
use App\User;
use Image;
use App\Team;

class TeamController extends Controller
{
    public function __construct() {
      $this->middleware('admin');
    }

    public function index()
    {
      $teams = Team::get();

      return view('admin.teams')->withTeams($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('teams.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'name' => 'required|max:20',
          'body' => 'max:1200',
          'wins' => 'integer',
          'loss' => 'integer',
        ));

        // Store in DB
        $team = new Team;

        $team->name = $request->name;
        $team->body = $request->body;
        $team->wins = $request->wins;
        $team->loss = $request->loss;

        $value = $team->name;
        $team->slug = str_slug($value);

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(500, 500)->save($location);

          $team->image = $filename;
        }

        $team->save();

        // Redirect
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
