var     gulp = require('gulp'),
        sass = require('gulp-sass');

var paths = {
  cwd : './src/wp-content/themes/',
  sass : './src/wp-content/themes/**/*.scss',
  php  : './src/wp-content/themes/**/*.php',
  js   : './src/wp-content/themes/**/*.js'
};

gulp.task('sass', function() {
  return gulp.src(paths.sass)
  .pipe(sass())
  .pipe(gulp.dest(paths.cwd));
});
gulp.task('serve', function() {
  gulp.watch([paths.sass], ['sass']);
});

gulp.task('default', ['serve']);