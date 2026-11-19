const path = require('path');
const webpack = require('webpack');
const { VueLoaderPlugin } = require('vue-loader');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    entry: ['./resources/js/app.js', './resources/sass/app.scss'],
    output: { path: path.resolve(__dirname, 'public'), filename: 'js/app.js', publicPath: '/' },
    module: {
        rules: [
            { test: /\.vue$/, loader: 'vue-loader' },
            {
                test: /\.s?css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    { loader: 'postcss-loader', options: { postcssOptions: { plugins: [require('autoprefixer')] } } },
                    'sass-loader'
                ]
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
        new MiniCssExtractPlugin({ filename: 'css/app.css' }),
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
            __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
        })
    ],
    optimization: { minimizer: ['...', new CssMinimizerPlugin()] },
    devServer: { static: path.resolve(__dirname, 'public') }
};
