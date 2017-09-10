/*==============================================
======= REQUIRES 
==============================================*/

var gulp = require('gulp'),
    gutil = require('gulp-util'),
    notify = require('gulp-notify'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    jshint = require('gulp-jshint'),
    rename = require('gulp-rename'),
    csscomb = require('gulp-csscomb'),
    autoprefixer = require('gulp-autoprefixer'),
    imagemin  = require('gulp-imagemin'),
    plumber = require('gulp-plumber'),
    browserSync = require('browser-sync');


/*==============================================
======= CONFIG
==============================================*/

var path = {
    src: 'ressources/src/',
    dist: 'ressources/dist/'
}

var urlToSync = "http://localhost/wordpress/";

/*==============================================
======= TASKS 
==============================================*/

/**
* Compile SASS to CSS
* Also the task minify, rename and put prefixes for old browsers
*/
gulp.task('style', function(){
    return gulp.src(path.src + 'scss/*.scss')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red('⚠️  Error (' + error.plugin + ') : \n\n' + error.message));
            this.emit('end');
        }))                           
        .pipe(sass.sync({                           
            outputStyle: 'compressed',
            errLogToConsole: true
        }))
        .pipe(rename({                              
            suffix: '.min'
        }))
        .pipe(autoprefixer({
            browsers: ['last 5 versions']
        }))
        .pipe(gulp.dest(path.dist + 'css/'))
        .pipe(browserSync.stream())
        .pipe(notify('Task style done ✔️'))
});

/**
* Concat, uglify and rename JS files
*/
gulp.task('js', function(){
    return gulp.src(path.src + 'js/internals/**/*.js')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red('⚠️  Error (' + error.plugin + ') : \n\n' + error.message));
            this.emit('end');
        }))
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish')) 
        .pipe(jshint.reporter("fail"))                          
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(path.dist + 'js/internals'))
        .pipe(browserSync.stream())
        .pipe(notify('Task js done ✔️'))
});

/**
* Compress images
*/
gulp.task('images', function(){
    return gulp.src(path.src + 'img/*')
        .pipe(imagemin())
        .pipe(gulp.dest(path.dist + 'img'))
        .pipe(notify('Task images done ✔️'))
});

/**
* Clean SASS files
*/
gulp.task('clean-sass', function(){
    return gulp.src([path.src + 'scss/**/*.scss', '!' + path.src +'scss/**/_mixins.scss'])
        .pipe(csscomb())
        .pipe(gulp.dest(path.src + 'scss'))
        .pipe(notify('Sass cleaned ✨'))
});

gulp.task("lint", function() {
    gulp.src(path.src + 'js/internals/**/*.js')
        
});

/**
* Auto refresh browser when changes are applied in the css, js, and php files
*/
gulp.task('browser-sync', function() {
    
    var files = [
    path.dist + '**/*.js',
    path.dist + '**/*.css',
    './**/*.php',
    './**/*.html'
    ];

    browserSync.init(files, {
        proxy: urlToSync,
        open: false
    });
});


/**
* First task to run !!
* Build the dist folder by copying files and executing tasks from src folder
*/
gulp.task('dist', ['style', 'js', 'images'], function(){
    gulp.src(path.src + 'fonts/**/*')
        .pipe(gulp.dest(path.dist + 'fonts'))
    gulp.src(path.src + 'css/**/*')
        .pipe(gulp.dest(path.dist + 'css'))
    gulp.src(path.src + 'js/vendors/**/*')
        .pipe(gulp.dest(path.dist + 'js/vendors'))

    console.log('Dist files created ⚙️');
});


/*==============================================
======= WATCHS
==============================================*/

/**
* Development task !!
* Execute the tasks style, js, images and refresh browser on change
*/
gulp.task('watch', ['browser-sync'], function(){
    gulp.watch(path.src + 'scss/**/*.scss', ['style']);
    gulp.watch(path.src + 'js/internals/**/*.js', ['js']);
    gulp.watch(path.src + 'img/*', ['images']); 
});