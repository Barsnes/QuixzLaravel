<?php

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/admin', 'PagesController@admin');

Route::get('/downloads', 'PagesController@downloads');


Route::resource('/admin/news', 'ArticleController');
Route::get('/news', 'PagesController@news');
Route::get('/news/{slug}', ['as' => 'article.single', 'uses' => 'PagesController@getSingle']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
