const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/src/index.js', 'resources/public/js')
    .sass('resources/src/scss/theme.scss', 'resources/public/css');

if (process.env.APP_ENV === "william") {
    mix.copyDirectory('resources/public', '/Users/pixney/Development/Repos/streamsdev/public/vendor/streams/ui')
} else {
    mix.copyDirectory('resources/public', '../../../public/vendor/streams/ui')
}

mix.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});

mix.webpackConfig({
    plugins: [
        require('@tailwindcss/ui'),
    ],
})

// mix.browserSync({
//     proxy: process.env.APP_URL,
//     files: [
//         'public/js/**/*.js',
//         'public/css/**/*.css',
//         'resources/views/**/*.html',
//         'resources/views/**/*.php',
//         'streams/**/*.json',
//         'streams/**/*.md'
//     ],
//     notify: false
// });


//mix.version();

// Purge css 
// if (mix.inProduction()) {
//     mix.sourceMaps().version();
// }
