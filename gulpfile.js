var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('styles', function(){
	gulp.src('sass/*.scss')
	.pipe(sass({errLogToConsole: true}))
	.pipe(autoprefixer('last 5 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
	.pipe(gulp.dest('.'))
});

gulp.task('watch',function() {
   gulp.watch('sass/*.scss',['styles']); // we run the "styles" task every time one of the scss files change
 });