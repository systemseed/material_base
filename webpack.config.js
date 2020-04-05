const path = require('path');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const SuppressChunksPlugin = require('suppress-chunks-webpack-plugin').default;

function tryResolve_(url, sourceFilename) {
  // Put require.resolve in a try/catch to avoid node-sass failing with cryptic libsass errors
  // when the importer throws
  try {
    return require.resolve(url, {paths: [path.dirname(sourceFilename)]});
  } catch (e) {
    return '';
  }
}

function tryResolveScss(url, sourceFilename) {
  // Support omission of .scss and leading _
  const normalizedUrl = url.endsWith('.scss') ? url : `${url}.scss`;
  return tryResolve_(normalizedUrl, sourceFilename) ||
    tryResolve_(path.join(path.dirname(normalizedUrl), `_${path.basename(normalizedUrl)}`),
      sourceFilename);
}

function materialImporter(url, prev) {
  if (url.startsWith('@material')) {
    const resolved = tryResolveScss(url, prev);
    return {file: resolved || url};
  }
  return {file: url};
}

// Determine webpack build mode.
const mode = process.env.NODE_ENV || 'development';

module.exports = [{
  mode,
  entry: {
    base: ['./js/base.js', './scss/base.scss'],
    mdc: ['./js/mdc.js', './scss/mdc.scss'],
    // CSS witout JS needs to add to 'SuppressChunksPlugin' config
    grid: './scss/grid.scss',
    fonts: './scss/fonts.scss',
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/[name].js',
    sourceMapFilename: '[file].map',
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader
          },
          { loader: 'css-loader',
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => [autoprefixer()],
              sourceMap: true,
            }
          },
          {
            loader: 'sass-loader',
            options: {
              // Prefer Dart Sass
              implementation: require('sass'),
              sassOptions: {
                includePaths: ['./node_modules'],
                importer: materialImporter
              },
              sourceMap: true,
            }
          },
        ]
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        query: {
          presets: ['@babel/preset-env'],
        },
      },
      {
      test: /\.(png|jpg|jpeg|webp|svg)$/,
        loader: 'file-loader',
        options: {
          emitFile: false,
          name: '../../images/[name].[ext]'
        }
      },
    ]
  },
  devtool: 'source-map',
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
      chunkFilename: 'css/[id].css',
    }),
    new SuppressChunksPlugin([
      { name: 'fonts', match: /\.js$|\.js\.map$/ },
      { name: 'grid', match: /\.js$|\.js\.map$/ },
    ]),
  ],
  stats: {
    children: false
  },
}];
