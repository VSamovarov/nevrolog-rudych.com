let mix = require("laravel-mix");
let distPath = "public/front/";
let sourcePath = "resources/front/";

mix.config.fileLoaderDirs.fonts = "front/fonts";

require("laravel-mix-merge-manifest"); //Чтоб не затирал mix-manifest.json, а только обновлял данные
mix.sass(sourcePath + "sass/index.scss", distPath + "css").js(
    sourcePath + "js/index.js",
    distPath + "js"
);

if (mix.inProduction()) {
    mix.options({
        postCss: [
            require("postcss-unprefix"),
            require("css-mqpacker")({
                sort: true
            }),
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
        ]
    }).version();
} else {
    mix.sourceMaps(true, "source-map")
        .webpackConfig({
            devtool: "inline-source-map"
        })
        .disableNotifications();
}
mix.mergeManifest();
