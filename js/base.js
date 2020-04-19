function requireAll(r) {
  r.keys().forEach(r);
}

// Images for SVG sprite
requireAll(require.context('../icons/', true, /\.svg$/));

// Images for optimization
requireAll(require.context('../images/', true, /\.(png|jpg|jpeg|webp|svg)$/));
