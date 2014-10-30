var     gulp = require('gulp'),
 browserSync = require('browser-sync'),
      reload = browserSync.reload,
        sass = require('gulp-sass');

var paths = {
  cwd : './src/wp-content/themes/',
  sass : './src/wp-content/themes/**/*.scss',
  php  : './src/wp-content/themes/**/*.php',
  js   : './src/wp-content/themes/**/*.js'
};

gulp.task('sass', function() {
  gulp.src(paths.sass)
  .pipe(sass())
  .pipe(gulp.dest(paths.cwd));
});
gulp.task('reloadcss', ['sass'], function() {
  reload({stream : true});
});
gulp.task('serve', function() {
  browserSync({
    proxy: "localhost:8888",
    open: false,
    notify: {
      styles: ['opacity: 0', 'position: absolute']
    }
  });
  gulp.watch([paths.sass], ['reloadcss']);
  gulp.watch([paths.js, paths.php], function() {
    reload();
  });
});

gulp.task('default', ['serve']);