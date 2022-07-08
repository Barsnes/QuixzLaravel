<?php

namespace App\Http\Controllers;

use App\Team;
use App\Tournament;
use App\TournamentMatch;
use DB;
use Illuminate\Http\Request;

class TournamentMatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::get();

        return view('tournamentMatches.create')->withTournaments($tournaments);
    }

    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'name' => 'min:3|max:255',
            'enemy' => 'required|max:255',
            'tournament_id' => 'required',
            'quixzScore' => '',
            'enemyScore' => '',
            'enemyLogo' => 'image',
            'date' => 'required',
            'time' => '',
            'match_num' => 'required',
        ]);

        $team = Tournament::find($request->tournament_id);

        // Store in DB
        $match = new TournamentMatch;

        $match->name = $request->name;
        $match->tournament_id = $request->tournament_id;
        $match->team_id = $team->team_id;
        $match->enemy = $request->enemy;
        $match->quixzScore = $request->quixzScore;
        $match->enemyScore = $request->enemyScore;
        $match->date = $request->date;
        $match->match_num = $request->match_num;

        if ($request->hasFile('enemyLogo')) {
            $enemyLogo = $request->file('enemyLogo');
            $info = getimagesize($enemyLogo);
            $extension = image_type_to_extension($info[2]);
            $filename = time().$extension;
            $location = public_path('images/'.$filename);
            Image::make($enemyLogo)->resize(50, 50)->save($location);

            $match->enemyLogo = $filename;
        }

        $match->save();

        // Redirect
        return redirect('/admin/tournaments/'.$request->tournament_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $match = DB::table('tournament_matches')->where('id', '=', $id)->get()->get(0);
        $tournament = DB::table('tournaments')->where('id', '=', $match->tournament_id)->get()->get(0);

        return view('tournamentMatches.edit')->withMatch($match)->withTournament($tournament);
    }

    public function update(Request $request, $id)
    {
        // Validate data
        $this->validate($request, [
            'name' => 'min:3|max:255',
            'enemy' => 'required|max:255',
            'tournament_id' => '',
            'quixzScore' => '',
            'enemyScore' => '',
            'enemyLogo' => 'image',
            'date' => 'required',
            'time' => '',
            'match_num' => 'required',
        ]);

        // Store in DB
        $match = DB::table('tournament_matches')->where('id', '=', $id)->get()->get(0);

        DB::table('tournament_matches')->where('id', $id)->update([
            'name' => $request->name,
            'enemy' => $request->enemy,
            'quixzScore' => $request->quixzScore,
            'enemyScore' => $request->enemyScore,
            'date' => $request->date,
            'match_num' => $request->match_num,
            'time' => $request->time,
        ]);

        // Redirect
        return redirect('/admin/tournaments/'.$request->tournament_id);
    }

    public function destroy($id)
    {
        //
    }
}
