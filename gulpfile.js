const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

    mix.sass('app.scss')
   .sass('site.scss', 'public/user/css/site.css')
   .sass('home.scss', 'public/user/css/home.css')
   .sass('admin-style-1.scss', 'public/admin/css/admin-style-1.css')
   .webpack('app.js')
   .scripts('chart.js', 'public/admin/js/chart.js')
   .scripts('question.js', 'public/user/js/question.js')
   .scripts('survey.js', 'public/admin/js/survey.js')
   .scripts('admin-script.js', 'public/admin/js/admin-script.js')
   .scripts(['question.js'], 'public/user/js/question.js')
   .copy('resources/assets/fonts', 'public/admin/fonts')
   .copy([
            'public/bower/bootstrap/dist/js/bootstrap.min.js',
            'public/bower/bootstrap/dist/js/bootstrap.js',
            'public/bower/jquery/dist/jquery.js'
         ], 'public/admin/js')
   .copy([
            'public/bower/bootstrap/dist/css/bootstrap.css',
            'public/bower/bootstrap/dist/css/bootstrap.min.css'
         ], 'public/admin/css')
   .browserSync({
        proxy: 'http://localhost:8000/',
        proxy: 'http://survey.com/'
    });
});
