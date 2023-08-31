<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RocketLeagueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/hello', function (Request $request) {
    return response()->json([
        'message' => 'Welcome to the API',
        'status' => 'success',
    ]);
});

Route::get('/rl/match/{id}', [RocketLeagueController::class, 'getMatch']);
Route::post('/rl/match', [RocketLeagueController::class, 'saveMatch']);
Route::post('/rl/match/{id}', [RocketLeagueController::class, 'updateMatch']);
Route::post('/rl/match/{id}/score', [RocketLeagueController::class, 'updateScore']);
Route::get('/rl/division/{division}', [RocketLeagueController::class, 'getDivisionTable']);