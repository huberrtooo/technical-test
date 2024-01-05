const path = require("path");
const glob = require("glob");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
// const HtmlWebpackPlugin = require('html-webpack-plugin');
const { PurgeCSSPlugin } = require("purgecss-webpack-plugin");



module.exports = {
    watch: true,
    stats: 'errors-only',
    watchOptions: {
        aggregateTimeout: 0,
        ignored: ['/node_modules/'],
        // poll: 1000,
    },
    // mode: "production",
    mode: "development",
    entry: {
        main: "./src/main.js",
        vendor: "./src/vendor.js",
    },
    output: {
        // filename: "[name].[contenthash].bundle.js",
        filename: "[name].bundle.js",
        path: path.resolve(__dirname, "dist"),
        // clean: true,
    },
    plugins: [
        // new MiniCssExtractPlugin({ filename: "[name].[contenthash].css" }),
        new MiniCssExtractPlugin({ filename: "[name].css" }),

        // new PurgeCSSPlugin({
        //     paths: glob.sync([
        //         path.join(__dirname, '**/*.php'),
        //         path.join(__dirname, '**/*.js'),
        //     ]).filter((file) => !file.includes('@fancyapps/ui/dist/fancybox/fancybox.css')),
        //     whitelist: ["hp-nws__image--1", "hp-nws__image--2", "hp-nws__image--3", 'hp-nws__box--11', 'hp-nws__box--22', 'hp-nws__box--33', 'wpcf7-acceptance', 'wpcf7-response-output', 'wpcf7-list-item', 'wpcf7-list-item-label', 'formInfo', 'splide__arrow', 'splide__arrow--next', 'splide__arrow--prev', 'splide__sr', 'wp-block-spacer', 'wpDataTableContainerSimpleTable'],
        //     whitelistPatterns: [/\b\w*fancybox\w*\b/],
        //     // whitelistPatternsChildren: [/^@fancyapps\//],
        // }),

        new BrowserSyncPlugin({
            // browse to http://localhost:3000/ during development,
            host: 'helloyouonline.local',
            port: 3000,
            files: ['./*.php'],
            // server: { baseDir: ['public'] }
            proxy: 'http://technical-test.local/',
            reloadDelay: 0,
        }),
    ],
    module: {
        rules: [
            {
                test: /\.(scss|css)$/,
                use: [
                    // Extract CSS into files
                    MiniCssExtractPlugin.loader,

                    // Inject CommonJS into the DOM.
                    // "style-loader",

                    // Translates CSS into CommonJS
                    "css-loader",

                    // Compiles Sass to CSS
                    "sass-loader",
                ]
            }
        ]
    }
}