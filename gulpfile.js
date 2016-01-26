var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var autoprefixer = require('gulp-autoprefixer');
var $ = require('gulp-load-plugins')();

// define tasks here

gulp.task('sass', function () {
  return gulp.src('static/scss/*.scss')

    // Compile Sass
    .pipe(
      $.sass({
        style: 'nested',
      })
      .on('error', $.sass.logError)
    )

    // Run CSS through autoprefixer
    .pipe($.autoprefixer('last 10 version'))

    // Write development assets
    .pipe(gulp.dest('static/css'));

});

gulp.task('default', ['sass']);

gulp.task('watch', function () {
  gulp.watch('static/scss/*/**.scss', ['sass']);
});
