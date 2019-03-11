const gulp = require('gulp');
const DefaultRegistry = require('undertaker-registry');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const phpunit = require('gulp-phpunit');

class MyRegistry extends DefaultRegistry {
    init() {
        gulp.task('test', done => {
            gulp.src('./phpunit.xml')
                .pipe(plumber({
                    errorHandler: notify.onError('Error: <%= error.message %>'),
                }))
                .pipe(phpunit('vendor/bin/phpunit'));
            done();
        });
    }
};

module.exports = new MyRegistry();
