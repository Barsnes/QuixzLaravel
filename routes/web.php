<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');
// Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/admin', 'PagesController@admin');

Route::get('/about', function () {

    $about = DB::table('about')->take(1)->get();

    return view('about', ['about' => $about]);
});

Route::get('{url}', function ($url) {
    return app(App\Http\Controllers\Cms\PagesController::class)->show($url);
})->where('url', '([A-z\d-\/_.]+)?');
