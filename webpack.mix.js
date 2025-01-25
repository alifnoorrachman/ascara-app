const mix = require('laravel-mix');

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

mix.postCss('resources/css/app.css', 'public/css', [
  require('tailwindcss'),
]);