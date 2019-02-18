const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/script.js', 'public/js')
    .js('resources/js/imageloader.js', 'public/js')
    .js('resources/js/image-upload-form.js', 'public/js')
    .js('resources/js/attribute-add-form.js', 'public/js')
    .js('resources/js/related-product-add-form.js', 'public/js')
    .js('resources/js/form-updater.js', 'public/js')
    .js('resources/js/cart.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
