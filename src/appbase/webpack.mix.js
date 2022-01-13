const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.setPublicPath('public');
mix.setResourceRoot('../');

mix.js('resources/js/main.js', 'public/js')
   .js('resources/js/app.js', 'public/js')
   .extract(['jquery', 'overlayscrollbars', 'popper.js', 'bootstrap'])
   .sass('resources/sass/main.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css')
   .copyDirectory('resources/assets/img', 'public/img')
   .scripts([
      'resources/plugins/TableFilter/TableFilter.js'
   ], 'public/js/CustomForIndex.js');
