<?php
use Spatie\Sitemap\SitemapGenerator;

Route::get('sitemap', function() {

  SitemapGenerator::create('https://quixz.eu/')->writeToFile('sitemap.xml');
  return('sitemap created');

});

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/teams', 'PagesController@teams');
Route::get('/contact', 'PagesController@contact');
Route::get('/servers', 'ServerController@servers');

Route::get('/downloads', 'PagesController@downloads');
Route::get('/management', 'PagesController@management');


Route::resource('/admin/news', 'ArticleController');
Route::get('/news', 'PagesController@news');
Route::get('/news/{slug}', ['as' => 'article.single', 'uses' => 'PagesController@getSingle']);
Route::get('/admin/users', 'AdminController@users');

Route::get('/player/{playerName}', ['as' => 'player.single', 'uses' => 'PagesController@getPlayer']);

Route::get('/team/{slug}', ['as' => 'team.single', 'uses' => 'PagesController@getTeam']);

Route::get('/tournaments/{slug}', ['as' => 'tournament.single', 'uses' => 'PagesController@getTournament']);

Route::get('/management/{slug}', ['as' => 'management.person', 'uses' => 'PagesController@getManagementPerson']);





Route::resource('/admin/matches', 'MatchController');
Route::resource('/admin/players', 'PlayerController');
Route::resource('/admin/teams', 'TeamController');
Route::resource('/admin/tournaments', 'TournamentsController');
Route::resource('/admin/about', 'AboutController');
Route::resource('/admin/index', 'IndexController');
Route::resource('/admin/tourn-match', 'TournamentMatchController');
Route::resource('/admin/management', 'ManagementController');
Route::resource('/admin/servers', 'ServerController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/discord', function(){
  $url = 'https://discord.gg/6QxSnV5';
  return Redirect::to($url);
});
