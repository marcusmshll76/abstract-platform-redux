const mix = require('laravel-mix');

mix.less('resources/less/session/session.less', 'public/css' )
    .less('resources/less/app/app.less', 'public/css' )
    .js('resources/js/app.js', 'public/js');