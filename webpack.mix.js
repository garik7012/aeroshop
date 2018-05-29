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
    public: 'www',
    assets: 'resources/assets'
};

mix.options({
    purifyCss: false,
    postCss: []
});

mix.extract(vendors, 'www/js/vendor.js')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery', 'jquery']
    });

mix.js(config.assets + "/js/scripts.js", 'www/js/scripts.js').version();
mix.js(config.assets + "/js/admin.js", 'www/js/admin.js').version();
mix.js(config.assets + "/js/list-greed.js", 'www/js/list-greed.js').version();

mix.copy('node_modules/fancybox/dist/img', config.public + '/img', false);

mix.sass('resources/assets/sass/app.scss', 'www/css')
    .sass('resources/assets/sass/admin.scss', 'www/css')
    .sass('resources/assets/sass/extras.scss', 'www/css').options({ processCssUrls: false }).version();