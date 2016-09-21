import gulp from "gulp";
import gulpLoadPlugins from "gulp-load-plugins";

const $ = gulpLoadPlugins();
const path = {
  source: {
    styles: {
      main: './resources/assets/styles/',
      modules: './app/*/Assets/styles/'
    },
    scripts: {
      main: './resources/assets/scripts/',
      modules: './app/*/Assets/scripts/'
    },
    fonts: [
      './node_modules/font-awesome/fonts/**/*'
    ]
  },
  dest: {
    styles: './public/css',
    scripts: './public/js',
    fonts: './public/fonts'
  }
};

const processCss = (files, name) => {
  const AUTOPREFIXER_BROWSERS = [
    'ie >= 10',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4.4',
    'bb >= 10'
  ];

  return gulp.src(files)
    .pipe($.sourcemaps.init())
    .pipe($.concat(name + '.css'))
    .pipe($.sass({
      precision: 10,
      includePaths: [
        './node_modules/',
        path.source.styles.main
      ]
    }).on('error', $.sass.logError))
    .pipe($.autoprefixer(AUTOPREFIXER_BROWSERS))
    .pipe($.replace('/*!', '/*'))
    .pipe($.if($.util.env.production, $.csso()))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(path.dest.styles));
};

const processJs = (files, name) => {
  return gulp.src(files)
    .pipe($.sourcemaps.init())
    .pipe($.concat(name + '.js'))
    .pipe($.browserify({
      insertGlobals: true,
      debug: !$.util.env.production
    }))
    .pipe($.babel())
    .pipe($.if($.util.env.production, $.uglify()))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(path.dest.scripts));
};

gulp.task('styles', () => {
  return processCss([
    path.source.styles.main + 'admin.scss',
    path.source.styles.modules + 'admin.scss'
  ], 'admin').pipe($.size({
    title: 'styles'
  }));
});

gulp.task('scripts', () => {
  return processJs([
    path.source.scripts.main + 'admin.js',
    path.source.scripts.modules + 'admin.js'
  ], 'admin').pipe($.size({
    title: 'scripts'
  }));
});

gulp.task('fonts', () => {
  return gulp.src(path.source.fonts)
    .pipe(gulp.dest(path.dest.fonts))
    .pipe($.size({title: 'fonts'}));
});

gulp.task('watch', ['default'], () => {
  gulp.watch([
    path.source.styles.modules + '**/*.scss',
    path.source.styles.main + '**/*.scss'
  ], ['styles']);
  gulp.watch([
    path.source.scripts.modules + '**/*.js',
    path.source.scripts.main + '**/*.js'
  ], ['scripts']);
});

gulp.task('default', ['styles', 'scripts', 'fonts']);
