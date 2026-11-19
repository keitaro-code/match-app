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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

// Translate Mix 6's hot-reload settings for webpack-dev-server 5.
mix.override(config => {
    if (!config.devServer.onBeforeSetupMiddleware) return;

    const { https, onBeforeSetupMiddleware, ...settings } = config.devServer;
    config.devServer = {
        ...settings,
        server: https ? 'https' : 'http',
        setupMiddlewares(middlewares, server) {
            onBeforeSetupMiddleware(server);
            return middlewares;
        }
    };
});
