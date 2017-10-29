const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('public/assets/bower/wickedpicker/dist/wickedpicker.min.js', 'public/js')
   .styles('public/assets/bower/wickedpicker/dist/wickedpicker.min.css', 'public/css')
   .sass('resources/assets/sass/app.scss', 'public/css');
