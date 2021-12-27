var gulp = require('gulp');

// concat
concat = require('gulp-concat');
// sass
sass = require('gulp-ruby-sass');
scss = require('gulp-sass');
// autoprefix css
autoprefixer = require('gulp-autoprefixer');
// rename files
rename = require('gulp-rename');
// show size of project
size = require('gulp-size');
// livereload
livereload = require('gulp-livereload');
// sourcemaps
sourcemaps = require('gulp-sourcemaps');
// minify js
uglify = require('gulp-uglify');
// minify css
cleanCSS = require('gulp-clean-css');
// group media queries
gcmq = require('gulp-group-css-media-queries');

// Assets directory
assetsDir = 'ecommerce_assets';

gulp.task('default', ['styles', 'javascript'], function() {

});

// Compile all css files
// gulp.task('styles', function() {
//     return sass(assetsDir + '/styles/main.scss', {
//             style: 'expanded',
//             precision: 10,
//             sourcemap: true
//         })
//         .pipe(autoprefixer('last 2 versions'))
//         .pipe(gcmq())
//         .pipe(cleanCSS({ compatibility: 'ie8' }))
//         .pipe(rename('style.css'))
//         .pipe(size())
//         .pipe(sourcemaps.write())
//         .pipe(gulp.dest(assetsDir + '/../'))
// });



gulp.task('styles', function() {
    gulp.src(assetsDir + '/styles/main.scss')
    .pipe(scss({outputStyle:'expanded'}))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gcmq())
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    .pipe(rename('style.css'))
    .pipe(size())
    .pipe(sourcemaps.write())
    .pipe(livereload())
    .pipe(gulp.dest(assetsDir + '/../'));
    

});



// Compile javascript and minify end file
gulp.task('javascript', function() {
    gulp.src(
            [
                assetsDir + '/javascript/vendors/*.js',
                assetsDir + '/javascript/custom/*.js',
            ]
        )
        .pipe(concat('compiled-scripts.js'))
        .pipe(uglify())
        .pipe(livereload())
        .pipe(gulp.dest(assetsDir + '/../js/'))

});



// Run gulp watch
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch(assetsDir + '/styles/**/*.scss', ['styles']);
    gulp.watch(assetsDir + '/javascript/**/*.js', ['javascript']);
    gulp.watch(assetsDir + '/../**/*.php', ['javascript']);
});