'use strict';
//gulp
const gulp = require('gulp');
//sass
const sass = require('gulp-sass');
// media query
const mq = require('gulp-combine-mq');
// errror
const plumber = require('gulp-plumber');
// notify
const notify = require('gulp-notify');
// browserSync
const browserSync = require('browser-sync');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src(['./html/sass/*.scss', './html/sass/**/*.scss'], { sourcemaps: true })
    //エラーの処理
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(sass({
      outputStyle: 'compressed',
    }))
    //メディアクエリを一つにまとめる
    .pipe(mq({
      beautify: false
    }))
    // mapの出力
    .pipe(gulp.dest('./html/css/', { sourcemaps: '../maps/' }))
    .pipe(browserSync.reload({ stream: true }))
    ;
});

// SASSのウオッチ
gulp.task('sass:watch', function () {
  gulp.watch(['./html/sass/*.scss', './html/sass/**/*.scss'], gulp.series('sass'));
});


// HTMLのウオッチ
gulp.task('html:watch', function () {
  gulp.watch(['./html/*.html', './html/**/*.html']).on('change', browserSync.reload);
});

//ブラウザシンク
gulp.task('bs', function () {
  browserSync({
    server: {
      baseDir: './html/',
      index: 'index.html'
    },
    open: true,//ここをfalseにしておいたら勝手にブラウザに移動しなくなる
    browser: ["google chrome"]
  })
})

// gulpで動く
gulp.task('default', gulp.parallel('html:watch', 'bs', 'sass:watch')
);
gulp.task('html', gulp.parallel('sass')
);
