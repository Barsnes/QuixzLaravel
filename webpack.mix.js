const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/master.scss', 'public/css/master.css').options({ processCssUrls: false }).version();

/* mix.sass('resources/sass/master.scss', 'public/css/master.css').version(); */