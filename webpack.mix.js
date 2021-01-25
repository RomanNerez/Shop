require('laravel-mix-bundle-analyzer');

let _mix = require('laravel-mix'),
    entry = {
        js: 'resources/assets/js/',
        css: 'resources/assets/sass/'
    },
    output = {
        js: 'public/assets/js/',
        css: 'public/assets/css/'
    };

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

_mix.js(entry.js +'cabinet/admin/index.js', output.js +'admin.js')
    .js(entry.js +'cabinet/user/index.js',  output.js +'user.js')
    .js(entry.js +'public/index.js',        output.js +'public.js')
    .js(entry.js +'main.js',        output.js +'main.js')
    .extract(['vue'])
    .version();

_mix.sass(entry.css +'cabinet/admin/index.scss', output.css +'admin.css')
    //.sass(entry.css +'cabinet/user/index.scss',  output.css +'user.css')
    .sass(entry.css +'public/index.scss',        output.css +'public.css')
    .version();

if (!_mix.inProduction()) {
    _mix.sourceMaps();
}