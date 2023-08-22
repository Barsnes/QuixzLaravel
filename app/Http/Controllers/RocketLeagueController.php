<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RLMatches;

class RocketLeagueController extends Controller
{
  public function getMatch($id) {
    $match = RLMatches::where('id', '=',$id)->first();
    return $match;
  }

  public function saveMatch(Request $request) {
    $match = new RLMatches;
    $match->blue_team_logo = $request->blue_team_logo;
    $match->blue_team_score = $request->blue_team_score;
    $match->orange_team_logo = $request->orange_team_logo;
    $match->orange_team_score = $request->orange_team_score;
    $match->match_type = $request->match_type;
    $match->tournament = $request->tournament;
    $match->save();

    return $match;
  }

  public function updateMatch(Request $request, $id) {
    $match = RLMatches::where('id', '=', $id)->first();
    $match->blue_team_logo = $request->blue_team_logo;
    $match->blue_team_score = $request->blue_team_score;
    $match->orange_team_logo = $request->orange_team_logo;
    $match->orange_team_score = $request->orange_team_score;
    $match->match_type = $request->match_type;
    $match->tournament = $request->tournament;
    $match->save();

    return $match;
  }

  public function updateScore(Request $request, $id) {
    $match = RLMatches::where('id', '=', $id)->first();
    $match->blue_team_score = $request->blue_team_score;
    $match->orange_team_score = $request->orange_team_score;
    $match->save();

    return $match;
  }
}
