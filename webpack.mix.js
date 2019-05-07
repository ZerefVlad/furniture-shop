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
    .js('resources/js/comment.js', 'public/js')
    .js('resources/js/imageloader.js', 'public/js')
    .js('resources/js/image-upload-form.js', 'public/js')
    .js('resources/js/attribute-add-form.js', 'public/js')
    .js('resources/js/related-product-add-form.js', 'public/js')
    .js('resources/js/form-updater.js', 'public/js')
    .js('resources/js/cart.js', 'public/js')
    .js('resources/js/videoloader.js', 'public/js')

    // .js('resources/plugins/modernizr.custom.js', 'public/js')
    // .js('resources/plugins/iesupport/html5shiv.js', 'public/js')
    // .js('resources/plugins/iesupport/respond.min.js', 'public/js')
    // .js('resources/plugins/jquery/jquery-1.11.1.min.js', 'public/js')
    // .js('resources/plugins/bootstrap/js/bootstrap.min.js', 'public/js')
    // .js('resources/plugins/bootstrap-select/js/bootstrap-select.min.js', 'public/js')
    // .js('resources/plugins/superfish/js/superfish.min.js', 'public/js')
    // .js('resources/plugins/prettyphoto/js/jquery.prettyPhoto.js', 'public/js')
    // .js('resources/plugins/owl-carousel2/owl.carousel.min.js', 'public/js')
    // .js('resources/plugins/jquery.sticky.min.js', 'public/js')
    // .js('resources/plugins/jquery.easing.min.js', 'public/js')
    // .js('resources/plugins/jquery.smoothscroll.min.js', 'public/js')
    // .js('resources/plugins/smooth-scrollbar.min.js', 'public/js')
    // .js('resources/js/theme.js', 'public/js')

    .js('resources/js/search.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
