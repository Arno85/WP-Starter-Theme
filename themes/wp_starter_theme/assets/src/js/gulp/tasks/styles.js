'use strict';

/**
* Task style
* Compile SASS to CSS
* Minify, rename and autoprefix css rules for old browsers
* @author Arnaud Martin
*/

module.exports = ($, config) => {
    $.gulp.task('styles', () => {
        let success = true;
        return $.gulp.src(config.dirPath.src + 'scss/*.scss')
            .pipe($.plumber({
                errorHandler: function(error) {
                    $.notify.onError({
                        title:'⚠️  Error (<%= error.plugin  %>): ',
                        message: '<%= error.message %>'
                    })(error);
                    this.emit('end');
                }
            }))
            .pipe($.sass.sync({
                outputStyle: 'compressed',
                errLogToConsole: true
            }))
            .pipe($.rename({
                suffix: '.min'
            }))
            .pipe($.autoprefixer({
                browsers: ['last 5 versions']
            }))
            .pipe($.gulp.dest(config.dirPath.dist + 'css/'))
            .pipe($.browserSync.stream())
            .pipe($.notify({
                title: '✔️  Success',
                message: 'Task styles done',
                onLast: true
            }));
    });
};