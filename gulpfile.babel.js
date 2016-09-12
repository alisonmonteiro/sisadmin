import gulp from "gulp";
import gulpLoadPlugins from "gulp-load-plugins";

const $ = gulpLoadPlugins();
const path = {
  styles: {
    main: './resources/assets/styles/',
    modules: './app/*/Assets/styles/'
  },
  scripts: {
    main: './resources/assets/scripts/',
    modules: './app/*/Assets/scripts/'
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
        path.styles.main
      ]
    }).on('error', $.sass.logError))
    .pipe($.autoprefixer(AUTOPREFIXER_BROWSERS))
    .pipe($.replace('/*!', '/*'))
    .pipe($.if($.util.env.production, $.csso()))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest('./public/css'));
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
    .pipe(gulp.dest('./public/js'));
};

gulp.task('styles', () => {
  return processCss([
    path.styles.main + 'admin.scss',
    path.styles.modules + 'admin.scss'
  ], 'admin').pipe($.size({
    title: 'styles'
  }));
});

gulp.task('scripts', () => {
  return processJs([
    path.scripts.main + 'admin.js',
    path.scripts.modules + 'admin.js'
  ], 'admin').pipe($.size({
    title: 'scripts'
  }));
});

gulp.task('watch', ['default'], () => {
  gulp.watch([
    path.styles.modules + '**/*.scss',
    path.styles.main + '**/*.scss'
  ], ['styles']);
  gulp.watch([
    path.scripts.modules + '**/*.js',
    path.scripts.main + '**/*.js'
  ], ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);
