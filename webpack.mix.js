const mix = require('laravel-mix');
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                exclude: /(bower_components)/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: Config.babel()
                    }
                ]
            }
        ]
    }
});
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
mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    'popper.js': ['Popper']
});
;


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version() .options({
    autoprefixer: {
        options: {
            browsers: [
                'last 10 versions',
            ]
        }
    }
});

mix.js('public/service-resourse/assets/js/app.js', 'public/service-resourse/js');

