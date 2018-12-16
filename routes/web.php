<?php

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/teams', 'PagesController@teams');
Route::get('/contact', 'PagesController@contact');

Route::get('/downloads', 'PagesController@downloads');


Route::resource('/admin/news', 'ArticleController');
Route::get('/news', 'PagesController@news');
Route::get('/news/{slug}', ['as' => 'article.single', 'uses' => 'PagesController@getSingle']);
Route::get('/admin/users', 'AdminController@users');

Route::get('/player/{playerName}', ['as' => 'player.single', 'uses' => 'PagesController@getPlayer']);

Route::get('/team/{slug}', ['as' => 'team.single', 'uses' => 'PagesController@getTeam']);

Route::resource('/admin/matches', 'MatchController');
Route::resource('/admin/players', 'PlayerController');
Route::resource('/admin/games', 'GameController');
Route::resource('/admin/teams', 'TeamController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
