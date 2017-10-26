var webpack = require('webpack');
const path = require('path');

var env = new webpack.DefinePlugin({
  'process.env': {
    NODE_ENV: JSON.stringify('production')
  }
});

var config = {
  entry: {
    homepage: './jsx/homepage.js'
  },

  output: {
    path: path.resolve(__dirname, 'public/js'),
    filename: '[name].js'
  },

  plugins: [
    env,
    new webpack.optimize.UglifyJsPlugin()
  ],

  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',

        query: {
          presets: ['es2015', 'react', 'stage-3']
        }
      }
    ]
  }
};

module.exports = config;