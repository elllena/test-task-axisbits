const path = require('path');
const webpack = require("webpack");
module.exports = {
    output: {
        filename: 'main.min.js',
    },
    externals: {
        jQuery: 'jQuery',
    },
    plugins: [

        new webpack.ProvidePlugin({
            $: "jQuery",
            jQuery: "jQuery"
        })
    ],

    module: {
        rules: [
            {
                test: /\src\/scripts\/*.js/,
                exclude: /(node_modules)/,
                loader: 'babel-loader',
                query: {
                    presets: [
                        ['latest', { modules: true }, 'es2015', 'stage-0'],
                    ],
                }
            },
        ],
    },
};
