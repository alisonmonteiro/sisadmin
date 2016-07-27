import gulp from "gulp";
import gulpLoadPlugins from "gulp-load-plugins";

const $ = gulpLoadPlugins();

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
      includePaths: ['./node_modules/']
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
    './resources/assets/styles/admin.scss',
    './app/*/Assets/styles/admin.scss'
  ], 'admin').pipe($.size({
    title: 'styles'
  }));
});

gulp.task('scripts', () => {
  return processJs([
    './resources/assets/scripts/admin.js',
    './app/*/Assets/scripts/admin.js'
  ], 'admin').pipe($.size({
    title: 'scripts'
  }));
});

gulp.task('watch', ['default'], function() {
  gulp.watch([
    './app/*/Assets/**/*.scss',
    './resources/assets/styles/**/*.scss'
  ], ['styles']);
  gulp.watch([
    './app/*/Assets/**/*.js',
    './resources/assets/scripts/**/*.js'
  ], ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);
