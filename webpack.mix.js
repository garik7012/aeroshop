const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */
const vendors = [
    'jquery',
    'bootstrap'
];

const config = {
    npmDir: './node_modules',
    public: 'public',
    assets: 'resources/assets'
};

mix.options({
    purifyCss: false,
    postCss: []
});

mix.extract(vendors, 'public/js/vendor.js')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery', 'jquery']
    });

mix.js(config.assets + "/js/scripts.js", 'public/js/scripts.js').version();

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/extras.scss', 'public/css').options({ processCssUrls: false }).version();