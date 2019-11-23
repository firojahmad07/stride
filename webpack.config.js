const path = require('path');
const { VueLoaderPlugin }  = require('vue-loader');

module.exports = {
    mode: 'production',
    entry: {
        "app": path.resolve(__dirname, 'public/stride/app.js'),
    },
    output: {
        path: path.resolve(__dirname, 'public/dist'),
        filename: '[name].bundle.js'
    },
    module: {
        rules:[ { test: /\.vue$/, loader: "vue-loader" },
                { test: /\.css$/, use: [ 'style-loader', 'css-loader' ]}
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
    ]
};