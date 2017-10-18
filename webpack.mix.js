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

// .sass('resources/assets/sass/app.scss', 'public/css');
// mix.js('resources/assets/js/initial.js', 'public/js')
//     .scripts(['public/js/initial.js', 'resources/assets/js/material.min.js', 'resources/assets/js/ripples.min.js', 'resources/assets/js/app.js'], 'public/js/app.js')

// mix.js('resources/assets/js/initial.js', 'public/js/app.js').version();
// mix.sass('resources/assets/sass/app.scss', 'public/css').
//     styles(['public/css/app.css', 'resources/assets/css/bootstrap.min.css',
//         'resources/assets/css/bootstrap-material-design.min.css',
//             'resources/assets/css/ripples.min.css', 'resources/assets/css/slick.css','resources/assets/css/xzoom.css',
//         'resources/assets/css/app.css'],
//         'public/css/app.css').version();

mix.js('resources/assets/js/initial.js', 'public/js/app.js').version();
mix.styles(['resources/assets/css/materialize.min.css','resources/assets/css/xzoom.css','resources/assets/css/app.css'], 'public/css/app.css').version();