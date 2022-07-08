<?php

use App\Player;
use Spatie\Sitemap\SitemapGenerator;

Route::get('sitemap', function () {
    SitemapGenerator::create('https://quixz.eu/')->writeToFile('sitemap.xml');

    return 'sitemap created';
});

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/teams', 'PagesController@teams');
Route::get('/contact', 'PagesController@contact');
Route::get('/servers', 'PagesController@servers');
Route::get('/tournaments', 'PagesController@tournaments');
Route::get('/medlem', 'PagesController@medlem');

Route::get('/downloads', 'PagesController@downloads');
Route::get('/management', 'PagesController@management');
Route::get('/privacy-policy-de', 'PagesController@policy_de');
Route::get('/statutes-de', 'PagesController@statutes_de');
Route::get('/form/club', 'ClubFormController@showForm');

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
Route::resource('/admin/sponsors', 'SponsorsController');
Route::resource('/admin/club', 'ClubFormController');
Route::resource('/admin/medlem', 'MedlemController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/discord', function () {
    $url = 'https://discord.gg/2GAhMZq';

    return Redirect::to($url);
});

Route::get('/store', function () {
    $url = 'https://store.quixz.eu';

    return Redirect::to($url);
});

Route::get('/twitch', function () {
    $url = 'https://twitch.tv/quixzesports/';

    return Redirect::to($url);
});

Route::get('feed', function () {

    // create new feed
    $feed = App::make('feed');

    // multiple feeds are supported
    // if you are using caching you should set different cache keys for your feeds

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(10, 'laravelFeedKey');

    // check if there is cached feed and build new only if is not
    if (! $feed->isCached()) {
        // creating rss feed with our most recent 20 posts
        $posts = \DB::table('articles')->orderBy('created_at', 'desc')->take(20)->get();

        // set your feed's title, description, link, pubdate and language
        $feed->title = 'Quixz Esports';
        $feed->description = 'All articles posted to Quixz Esports';
        $feed->logo = 'https://quixz.eu/assets/image/logo/logo_500.png';
        $feed->link = url('feed');
        $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
        $feed->pubdate = $posts[0]->created_at;
        $feed->lang = 'en';
        $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

       foreach ($posts as $post) {
           $post->description = strip_tags(substr($post->body, 0, 60));

           // set item's title, author, url, pubdate, description, content, enclosure (optional)*
           $feed->add($post->title, $post->author, URL::to('https://quixz.eu/news/'.$post->slug), $post->created_at, $post->description, $post->body);
       }
    }

    // first param is the feed format
    // optional: second param is cache duration (value of 0 turns off caching)
    // optional: you can set custom cache key with 3rd param as string
    return $feed->render('atom');

    // to return your feed as a string set second param to -1
    // $xml = $feed->render('atom', -1);
});
