let mix = require('laravel-mix')

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
  .sass('resources/assets/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false
  })
  .styles([
    'public/css/app.css',
    'node_modules/alertifyjs/build/css/alertify.min.css',
    'node_modules/alertifyjs/build/css/themes/default.min.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css'
  ], 'public/css/app.css')
  .copy('node_modules/bootstrap-sass/assets/fonts/', 'public/fonts')
  .copy('node_modules/font-awesome/fonts', 'public/fonts')
  .version()
