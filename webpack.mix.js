let mix = require('laravel-mix');

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

mix.copyDirectory('resources/assets/bootstrap', 'public/assets/bootstrap');
mix.copyDirectory('resources/assets/ember-challenge', 'public/assets/ember-challenge');
mix.copyDirectory('resources/assets/perfect-scrollbar', 'public/assets/perfect-scrollbar');
mix.copyDirectory('resources/assets/SimpleFolio', 'public/assets/SimpleFolio');
mix.copyDirectory('resources/assets/mdi', 'public/assets/mdi');
mix.copyDirectory('resources/assets/demo-bower', 'public/assets/demo-bower');
mix.copyDirectory('resources/assets/ckeditor', 'public/assets/ckeditor');
mix.copyDirectory('resources/assets/remarkable-bootstrap-notify', 'public/assets/remarkable-bootstrap-notify');
mix.copyDirectory('resources/assets/datetimepicker', 'public/assets/datetimepicker');
