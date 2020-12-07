const mix = require("laravel-mix");
require("laravel-mix-bundle-analyzer");
require("laravel-mix-merge-manifest"); //Чтоб не затирал mix-manifest.json, а только обновлял данные

mix.config.fileLoaderDirs.fonts = "admin/fonts";

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .sass("resources/admin/scss/index.scss", "public/admin/css")
  .js("resources/admin/js/app.js", "public/admin/js")
  .postCss("resources/admin/css/app.css", "public/admin/css", [
    require("postcss-import"),
    require("tailwindcss"),
    require("cssnano")({
      preset: [
        "default",
        {
          discardComments: {
            removeAll: true
          }
        }
      ]
    })
  ]);

mix.webpackConfig({
  output: {
    chunkFilename: "admin/js/chunks/[name].js"
  }
});
// if (mix.isWatching()) {
//     mix.bundleAnalyzer();
// }
if (mix.inProduction()) {
} else {
  // mix.sourceMaps(true, "source-map").webpackConfig({
  //     devtool: "inline-source-map"
  // });
}

mix.mergeManifest();
