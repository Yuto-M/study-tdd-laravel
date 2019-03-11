const gulp = require('gulp');
const test = require('./test.js');
const watch = require('./watch.js');

gulp.registry(test);
gulp.registry(watch);

// gulp.task('default', gulp.series(
//     'test',
//     'watch:test',
// ));

gulp.task('watch', gulp.series(
    // 'test',
    'watch:test',
));