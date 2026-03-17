const path = require('path');
const ESLintPlugin = require("eslint-webpack-plugin");
const StylelintPlugin = require("stylelint-webpack-plugin");
let rootPath = path.resolve(__dirname, '');
let rootPathArr = rootPath.split('\\');

if( rootPathArr.length <= 1 ){
    rootPathArr = rootPath.split('/');
}

rootPathArr.splice(-3)

let projectName = rootPathArr.pop();

const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');

var config = {
    mode: 'development',
    devtool: 'source-map',
    watch: true,
    plugins: [
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 3000,
            proxy: 'http://localhost/' + projectName
        }),

        // JS Linter
        new ESLintPlugin({
            overrideConfigFile: path.resolve(__dirname, ".eslintrc"),
            context: path.resolve(__dirname, "./assets/js"),
            files: "**/*.js",
        }),

        // CSS Linter
        new StylelintPlugin({
            configFile: path.resolve(__dirname, "stylelint.config.js"),
            context: path.resolve(__dirname, "./assets/scss"),
            files: [path.resolve(__dirname, "./assets/scss/") + "**/**/*.scss", path.resolve(__dirname, "./assets/scss/") + "**/**/*.css"]
        }),
    ],

};

module.exports = merge(common, config);