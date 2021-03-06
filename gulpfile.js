const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
        var
            assets       = 'resources/assets/',
            node_modules = 'node_modules/';

        mix
            .sass('app.scss', 'public/css/app.css')

            .scripts([
                assets + 'js/materialize.min.js',
                'functions.js'
            ], 'public/js/lib.js')

            .copy(assets + 'images', 'public/images')
            .copy(node_modules + 'materialize-css/fonts', 'public/build/fonts')

            .webpack('app.js')

            /*
             * Version
             */
            .version(
                [
                    'css/app.css',
                    'js/app.js',
                    'js/lib.js'
                ]
            );
    }
);