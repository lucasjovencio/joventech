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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts(['node_modules/select2/dist/js/select2.min.js'], 'public/js/select2.min.js');
mix.scripts(['node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js'], 'public/js/jquery.datetimepicker.js');
mix.styles(['node_modules/select2/dist/css/select2.min.css'], 'public/css/select2.min.css');
mix.styles(['node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css'], 'public/css/jquery.datetimepicker.css');