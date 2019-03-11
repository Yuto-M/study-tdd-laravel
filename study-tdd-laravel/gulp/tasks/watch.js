const DefaultRegistry = require('undertaker-registry');
const gulp = require('gulp');

class MyRegistry extends DefaultRegistry {
    init() {
        gulp.task('watch:test', done => {
            gulp.watch([
                'tests/**/*.php',
                'routes/**/*.php'
            ], { usePolling: true }, gulp.task(
                'test'
            ));
        });
    }
};

module.exports = new MyRegistry();
