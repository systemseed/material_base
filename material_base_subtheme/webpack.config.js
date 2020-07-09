const path = require('path');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const SuppressChunksPlugin = require('suppress-chunks-webpack-plugin').default;
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');

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
    theme: ['./js/theme.js', './scss/theme.scss'],
    mdc: ['./js/mdc.js', './scss/mdc.scss'],
    // CSS witout JS needs to add to 'SuppressChunksPlugin' config
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
        exclude: /icons\/.*\.svg$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              emitFile: true,
              name: '[path][name].[ext]',
              publicPath: '../',
            },
          },
          {
            loader: 'image-webpack-loader',
            options: {
              emitFile: false,
              mozjpeg: {
                progressive: true,
                quality: 90
              },
              optipng: {
                enabled: false,
              },
              pngquant: {
                quality: [0.85, 0.90],
                speed: 4
              },
              svgo: {
                enabled: true,
              },
              gifsicle: {
                enabled: false,
              },
              webp: {
                quality: 90
              }
            }
          },
        ]
      },
      {
        test: /icons\/.*\.svg$/,
        loader: 'svg-sprite-loader',
        options: {
          extract: true,
          spriteFilename: './images/icons.svg',
          runtimeCompat: true
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
    ]),
    new SpriteLoaderPlugin({
      plainSprite: true
    }),
  ],
  stats: {
    children: false
  },
}];
