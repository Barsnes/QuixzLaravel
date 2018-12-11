<?php

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::get('/downloads', 'PagesController@downloads');


Route::resource('/admin/news', 'ArticleController');
Route::get('/news', 'PagesController@news');
Route::get('/news/{slug}', ['as' => 'article.single', 'uses' => 'PagesController@getSingle']);
Route::get('/admin/users', 'AdminController@users');

Route::resource('/admin/matches', 'MatchController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
