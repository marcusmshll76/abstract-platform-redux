const mix = require('laravel-mix');
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@':__dirname + '/resources'
        }
    }
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')



/* mix.less('resources/less/session/session.less', 'public/css' )
    .less('resources/less/app/app.less', 'public/css' )
    .js('resources/js/app.js', 'public/js');
*/