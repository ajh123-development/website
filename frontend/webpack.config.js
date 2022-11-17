// webpack.config.js
var webpack = require('webpack');
module.exports = {
    entry: {
        entry: './javascript/index.js'
    },
    output: {
        path:  __dirname + '/../site/assets/javascripts/',
        filename: 'bundle.js',
        library: 'minerslib',
        libraryTarget: 'window',
    },
    mode: "production"
}