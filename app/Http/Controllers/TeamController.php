<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Match;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::get();

        return view('admin.teams')->withTeams($teams);
    }

    public function create()
    {
        $games = Game::get();

        return view('teams.create')->withGames($games);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role != 'Admin') {
            return redirect('/');
        }

        if (Auth::user()->role == 'Admin') {
            $this->validate($request, [
                'name' => 'required|max:30',
                'body' => 'max:10000',
                'wins' => 'integer',
                'loss' => 'integer',
                'game_id' => 'integer|required',
            ]);

            // Store in DB
            $team = new Team;

            $team->name = $request->name;
            $team->body = $request->body;
            $team->wins = $request->wins;
            $team->loss = $request->loss;
            $team->active = '1';
            $team->game_id = $request->game_id;

            $value = $team->name;
            $team->slug = Str::slug($value);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $filename = time().$extension;
                $location = public_path('images/'.$filename);
                Image::make($image)->save($location);

                $team->image = $filename;
            }

            $team->save();
        }
        // Redirect
        return redirect()->route('teams.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $team = Team::find($id);

        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'max:10000',
            'wins' => 'integer',
            'loss' => 'integer',
        ]);

        // Store in DB
        $team = Team::find($id);

        $team->body = $request->body;
        $team->wins = $request->wins;
        $team->loss = $request->loss;
        $team->active = $request->active;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $info = getimagesize($image);
            $extension = image_type_to_extension($info[2]);
            $filename = time().$extension;
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);

            $team->image = $filename;
        }

        $team->save();

        // Redirect
        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        //
    }
}
