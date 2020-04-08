let mix = require("laravel-mix");

/*
 * -----------------------------------------------------------------------------
 * Build Process
 * -----------------------------------------------------------------------------
 * The section below handles processing, compiling, transpiling, and combining
 * all of the theme's assets into their final location. This is the meat of the
 * build process.
 * -----------------------------------------------------------------------------
 */

/*
 * Sets the development path to assets. By default, this is the `/resources`
 * folder in the theme.
 */
const devPath = "src/assets";

/*
 * Sets the path to the generated assets. By default, this is the `/dist` folder
 * in the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath("dist/assets");

/**
 * Set the path for CSS url rewriting
 * Helpful when main stylesheet is in a folder since
 * laravel-mix generates an absolute path to the image by default
 */
mix.setResourceRoot("../");

/*
 * Set Laravel Mix options.
 *
 * @link https://laravel.com/docs/5.6/mix#postcss
 * @link https://laravel.com/docs/5.6/mix#url-processing
 */
// mix.options( {
// 	postCss        : [ require( 'postcss-preset-env' )() ],
// 	processCssUrls : false
// } );

/*
 * Builds sources maps for assets.
 *
 * @link https://laravel.com/docs/5.6/mix#css-source-maps
 */
mix.sourceMaps();

/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 */
if (mix.inProduction()) {
  mix.version();
}

/*
 * Compile JavaScript.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-scripts
 */
mix.js(`${devPath}/scripts/main.js`, "scripts");

/*
 * Compile CSS. Mix supports Sass, Less, Stylus, and plain CSS, and has functions
 * for each of them.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-stylesheets
 * @link https://laravel.com/docs/5.6/mix#sass
 * @link https://github.com/sass/node-sass#options
 */

// Sass configuration.
var sassOptions = {
  outputStyle: "expanded",
  indentType: "spaces",
  indentWidth: 2,
};

// Compile SASS/CSS.
mix.sass(`${devPath}/sass/main.scss`, "css", { sassOptions });

// Copy images
mix.copyDirectory(`${devPath}/images`, "dist/assets/images");

/*
 * Add custom Webpack configuration.
 *
 * Laravel Mix doesn't currently minimize images while using its `.copy()`
 * function, so we're using the `CopyWebpackPlugin` for processing and copying
 * images into the distribution folder.
 *
 * @link https://laravel.com/docs/5.6/mix#custom-webpack-configuration
 * @link https://webpack.js.org/configuration/
 */
// mix.webpackConfig( {
//   stats       : 'minimal',
//   devtool     : mix.inProduction() ? false : 'source-map',
//   performance : { hints  : false    },
//   externals   : { jquery : 'jQuery' },
//   plugins     : [
//     // @link https://github.com/webpack-contrib/copy-webpack-plugin
//     new CopyWebpackPlugin( [
//       { from : `${devPath}/images`,   to : 'images'   },
//       { from : `${devPath}/svg`,   to : 'svg'   },
//       { from : `${devPath}/fonts`, to : 'fonts' }
//     ] ),
//     // @link https://github.com/Klathmon/imagemin-webpack-plugin
//     new ImageminPlugin( {
//       test     : /\.(jpe?g|png|gif|svg)$/i,
//       disable  : process.env.NODE_ENV !== 'production',
//       optipng  : { optimizationLevel : 3 },
//       gifsicle : { optimizationLevel : 3 },
//       pngquant : {
//         quality : '65-90',
//         speed   : 4
//       },
//       svgo : {
//         plugins : [
//           { cleanupIDs                : false },
//           { removeViewBox             : false },
//           { removeUnknownsAndDefaults : false }
//         ]
//       },
//       plugins : [
//         // @link https://github.com/imagemin/imagemin-mozjpeg
//         imageminMozjpeg( { quality : 75 } )
//       ]
//     } )
//   ]
// } );

if (process.env.sync) {
  /*
   * Monitor files for changes and inject your changes into the browser.
   *
   * @link https://laravel.com/docs/5.6/mix#browsersync-reloading
   */
  mix.browserSync({
    proxy: "https://solera.dev.cc/",
    files: [
      "dist/**/*",
      "functions.php",
      "*.php",
      "templates/*.php",
      "template-parts/*.php",
    ],
  });
}

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
