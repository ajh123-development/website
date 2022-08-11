// webpack.config.js
var webpack = require('webpack');
module.exports = {
    entry: {
        entry: './index.js'
    },
    output: {
        path:  __dirname + '/../docs/',
        filename: 'bundle.js'
    },
    mode: "production"
}