<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function __construct() {
      $this->middleware('admin');
    }

    public function index()
    {
      $games = Game::get();
      return view('admin.games')->withGames($games);
    }

    public function create()
    {
      return redirect('admin/games');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'name' => 'required|unique:games,name',
        ));

      $game = new Game;
      $game->name = $request->name;
      $game->save();
      return redirect('admin/games');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
      Game::destroy($id);

      return redirect('/admin/games');
    }
}
