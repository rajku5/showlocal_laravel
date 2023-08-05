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
//  mix.webpackConfig({
    // processCssUrls: true,
    // terser: {},
    // purifyCss: false,
    // //purifyCss: {},
    // postCss: [require('autoprefixer')],
    // clearConsole: false,
    // stats: {
    //     children: true,
    // }
// });

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/bootstrap.scss', 'public/css')
    .sass('resources/sass/chartist.scss', 'public/css')
    .sass('resources/sass/color10.scss', 'public/css')
    .sass('resources/sass/datatables.scss', 'public/css')
    .sass('resources/sass/date-picker.scss', 'public/css')
    .sass('resources/sass/dropzone.scss', 'public/css')
    .sass('resources/sass/flag-icon.scss', 'public/css')
    .sass('resources/sass/font-awesome.scss', 'public/css')
    .sass('resources/sass/landing_page.scss', 'public/css')
    .sass('resources/sass/owlcarousel.scss', 'public/css')
    .sass('resources/sass/prism.scss', 'public/css')
    .sass('resources/sass/rating.scss', 'public/css')
    .sass('resources/sass/slick-theme.scss', 'public/css')
    .sass('resources/sass/slick.scss', 'public/css')
    .sass('resources/sass/themify.scss', 'public/css')
    .sass('resources/sass/vector-map.scss', 'public/css')
    .sourceMaps().options({
        processCssUrls: false,
        stats: {children: true,}
    });
