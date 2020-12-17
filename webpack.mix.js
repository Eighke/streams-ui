const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix
    .ts('resources/ts/index.ts', 'resources/public/js')
    .copyDirectory('resources/public', '../../../public/vendor/streams/ui')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    }).webpackConfig(

        /**
         * @return webpack.Configuration
         */
        function (webpack) {

            return {
                plugins: [
                    require('@tailwindcss/ui'),
                ],
                externals: {
                    '@streams/core': ['streams', 'core'],
                },
                output: {
                    library: ['streams', 'ui'],
                    libraryTarget: 'window'
                }
            };
        }
    )
    .sourceMaps();
