const {
    src,
    dest,
    task,
    series,
    watch,
    parallel
} = require('gulp');

const rm = require('gulp-rm');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const sassGlob = require('gulp-sass-glob');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify-es').default;
const svgo = require('gulp-svgo');
const svgSprite = require('gulp-svg-sprite');
const gulpif = require('gulp-if');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');

const env = process.env.NODE_ENV;

const {
    DIST_PATH,
    SRC_PATH,
    STYLE_LIBS,
    JS_LIBS
} = require('./gulp.config');

sass.compiler = require('sass');

task('clean', () => {
    console.log(env);
    return src(`${DIST_PATH}/**/*`, {
        read: false
    }).pipe(rm());
});


task('copy:html', () => {
    return src(`${SRC_PATH}/*.html`)
        .pipe(dest(DIST_PATH))
        .pipe(reload({
            stream: true
        }));
});

task('copy:images', () => {
    return src(`${SRC_PATH}/images/**/*`)
        .pipe(dest(`${DIST_PATH}/images/`))
        .pipe(reload({
            stream: true
        }));
});

task('copy:fonts', () => {
    return src(`${SRC_PATH}/fonts/**/*`)
        .pipe(dest(`${DIST_PATH}/fonts/`))
        .pipe(reload({
            stream: true
        }));
});

task('styles', () => {
    return src([...STYLE_LIBS, 'src/styles/style.scss'])
        .pipe(gulpif(env === 'dev',
            sourcemaps.init()))
        .pipe(concat('style.min.scss'))
        .pipe(sassGlob())
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(env === 'dev',
            autoprefixer({
                cascade: false
            })
        ))
        .pipe(gulpif(env === 'prod',
            cleanCSS({
                compatibility: 'ie8'
            })))
        .pipe(gulpif(env === 'prod',
            sourcemaps.write()))
        .pipe(dest(DIST_PATH))
        .pipe(reload({
            stream: true
        }));
});


task('scripts', () => {
    return src([...JS_LIBS, 'src/scripts/*.js'])
        .pipe(gulpif(env === 'dev', sourcemaps.init()))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe( webpackStream(webpackConfig), webpack )
        /*.pipe( gulpif(env === 'dev', concat('main.min.js', {
            newLine: ';'
        }) ) )*/
        .pipe(gulpif(env === 'dev', sourcemaps.write()))
        .pipe(dest(DIST_PATH))
        .pipe(reload({
            stream: true
    }));
});


task('icons', () => {
    return src('src/images/icons/*.svg')
        .pipe(svgo({
            plugins: [{
                removeAttrs: {
                    attrs: "(fill|stroke|style|width|height|data.*)"
                }
            }]
        }))
        .pipe(svgSprite({
            mode: {
                symbol: {
                    sprite: '../sprite.svg'
                }
            }
        }))
        .pipe(dest(`${DIST_PATH}/images/icons`));
})

task('server', () => {
    browserSync.init({
        server: {
            baseDir: "./dist"
        },
        open: false
    });
});

task('watch', () => {
    watch('./src/styles/**/*.scss', series('styles'));
    watch('./src/*.html', series('copy:html'));
    watch('./src/images/*', series('copy:images'));
    watch('./src/scripts/*.js', series('scripts'));
    watch('./src/images/icons/*.svg', series('icons'));
});

task('default',
    series(
        'clean',
        parallel('copy:html', 'copy:images', 'copy:fonts', 'styles', 'scripts', 'icons'),
        parallel('watch', 'server')
    )
);

task('build',
    series(
        'clean',
        parallel('copy:html', 'copy:images', 'copy:fonts', 'styles', 'scripts', 'icons'))
);