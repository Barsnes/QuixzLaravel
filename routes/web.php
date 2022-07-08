<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MedlemController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\SponsorsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentMatchController;
use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Player;
use Spatie\Sitemap\SitemapGenerator;

Route::get('sitemap', function () {
    SitemapGenerator::create('https://quixz.eu/')->writeToFile('sitemap.xml');

    return 'sitemap created';
});

Route::get('/', [PagesController::class, 'home']);
Route::get('/index', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/teams', [PagesController::class, 'teams']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/servers', [PagesController::class, 'servers']);
Route::get('/tournaments', [PagesController::class, 'tournaments']);
Route::get('/medlem', [PagesController::class, 'medlem']);

Route::get('/downloads', [PagesController::class, 'downloads']);
Route::get('/management', [PagesController::class, 'management']);
Route::get('/privacy-policy-de', [PagesController::class, 'policy_de']);
Route::get('/statutes-de', [PagesController::class, 'statutes_de']);
Route::get('/form/club', [ClubFormController::class, 'showForm']);

Route::resource('/admin/news', ArticleController::class);
Route::get('/news', [PagesController::class, 'news']);
Route::get('/news/{slug}', [PagesController::class, 'getSingle'])->name('article.single');
Route::get('/admin/users', [AdminController::class, 'users']);

Route::get('/player/{playerName}', [PagesController::class, 'getPlayer'])->name('player.single');

Route::get('/team/{slug}', [PagesController::class, 'getTeam'])->name('team.single');

Route::get('/tournaments/{slug}', [PagesController::class, 'getTournament'])->name('tournament.single');

Route::get('/management/{slug}', [PagesController::class, 'getManagementPerson'])->name('management.person');

Route::resource('/admin/matches', MatchController::class);
Route::resource('/admin/players', PlayerController::class);
Route::resource('/admin/teams', TeamController::class);
Route::resource('/admin/tournaments', TournamentsController::class);
Route::resource('/admin/about', AboutController::class);
Route::resource('/admin/index', IndexController::class);
Route::resource('/admin/tourn-match', TournamentMatchController::class);
Route::resource('/admin/management', ManagementController::class);
Route::resource('/admin/servers', ServerController::class);
Route::resource('/admin/sponsors', SponsorsController::class);
Route::resource('/admin/club', ClubFormController::class);
Route::resource('/admin/medlem', MedlemController::class);

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');

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
