// npm run build: Compiles assets for production.
// npm run dev: Watches files and recompiles as you edit them.

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: {
    main: './assets/js/main.js',     // JS entry file
    styles: './assets/scss/main.scss' // SCSS entry file
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    })
  ],
  devtool: 'source-map', // Useful for debugging
  mode: 'development'    // Change to 'production' for minified output
};
