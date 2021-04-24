//DEPENDENCIAS
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const htmlmin = require('gulp-htmlmin');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const babel = require('gulp-babel');
const terser = require('gulp-terser');
const imagemin = require('gulp-imagemin');
const sass = require('gulp-sass');
const cacheBust = require('gulp-cache-bust');
const pug = require('gulp-pug');
const {phpMinify} = require('@aquafadas/gulp-php-minify');
const php = require("gulp-connect-php");

const server = browserSync;

const postcssPlugins = [
    cssnano({
        core: true,
        zindex: false,
        autoprefixer: {
            add: true,
            browsers: '> 5%, last 2 versions, Firefox ESR, Opera 52.5'
        }
    })
];

//////////////////////////////////////////////////////////////
/// CARPETA PUBLIC
//////////////////////////////////////////////////////////////

gulp.task('', () => {
    return gulp
        .src('./public/**/*.html')
        .pipe(plumber())
        .pipe(
            htmlmin({
                collapseWhitespace: true,
                removeComments: true
            })
        )
        .pipe(gulp.dest('./out/public'));
});

gulp.task('public-fonts', () => {
    return gulp
        .src('./public/assets/fonts/**/*')
        .pipe(plumber())
        .pipe(gulp.dest('./out/public/assets/fonts'));
});

gulp.task('public-styles', () => {
    return gulp
        .src('./public/assets/**/*.css')
        .pipe(plumber())
        .pipe(postcss(postcssPlugins))
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/public/assets'))
        .pipe(server.stream())
});

gulp.task('public-babel', () => {
    return gulp
        .src('./public/assets/js/**/*.js')
        .pipe(plumber())
        .pipe(babel())
        .pipe(terser())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/public/assets/js'));
});

gulp.task('public-fonts-svg', () => {
    return gulp
        .src('./public/assets/fonts/font-icon/*.svg')
        .pipe(plumber())
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ quality: 30, progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({ plugins: [{ removeViewBox: false }] })
            ])
        )
        .pipe(gulp.dest('./out/public/assets/fonts/font-icon'));
});

gulp.task('public-img', () => {
    return gulp
        .src('./public/assets/img/**/*')
        .pipe(plumber())
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ quality: 30, progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({ plugins: [{ removeViewBox: false }] })
            ])
        )
        .pipe(gulp.dest('./out/public/assets/img'));
});

gulp.task('public', gulp.series('public-html', 'public-styles', 'public-fonts', 'public-fonts-svg', 'public-babel', 'public-img'));

//////////////////////////////////////////////////////////////
/// CARPETA SRC
//////////////////////////////////////////////////////////////

gulp.task('src-sass', () => {
    return gulp
        .src('./src/scss/*.scss')
        .pipe(plumber())
        .pipe(
            sass({
                outputStyle: 'compressed'
            })
        )
        .pipe(postcss(postcssPlugins))
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/src/scss'))
        .pipe(server.stream());
});

gulp.task('php-min', () => {
    return gulp
        .src('./src/template-mail/*.php')
        .pipe(phpMinify())
        .pipe(gulp.dest('./out/src/template-mail'));
});

gulp.task('src-php', function() {
    php.server({
        // a standalone PHP server that browsersync connects to via proxy
        port: 8000,
        keepalive: true,
        base: "dist"
    }, function (){
        browsersync({
            proxy: '127.0.0.1:8000'
        });
    });
});

gulp.task('src-html', () => {
    return gulp
        .src('./src/template-mail/*')
        .pipe(plumber())
        .pipe(
            htmlmin({
                collapseWhitespace: true,
                removeComments: true
            })
        )
        .pipe(gulp.dest('./out/src/template-mail'));
});

// .woff, .woff2, .ttf
gulp.task('src-fonts', () => {
    return gulp
        .src('./src/fonts/**/*')
        .pipe(plumber())
        .pipe(gulp.dest('./out/src/fonts'));
});

gulp.task('src-img', () => {
    return gulp
        .src('./src/img/**/*')
        .pipe(plumber())
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({quality: 30, progressive: true}),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({plugins: [{removeViewBox: false}]})
            ])
        )
        .pipe(gulp.dest('./out/src/img'));
});

gulp.task('src-babel', () => {
    return gulp
        .src('./src/js/*.js')
        .pipe(plumber())
        .pipe(babel())
        .pipe(terser())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/src/js'));
});

gulp.task('src-babel-modules', () => {
    return gulp
        .src('./src/js/modules/*.js')
        .pipe(plumber())
        .pipe(babel())
        .pipe(terser())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/src/js/modules'));
});

gulp.task('src-babel-plugins', () => {
    return gulp
        .src('./src/js/lib/jquery.lazy/plugins/*.js')
        .pipe(plumber())
        .pipe(babel())
        .pipe(terser())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./out/src/js/lib/jquery.lazy/plugins'));
});

gulp.task('pug',() => {
    return gulp
        .src('./src/pug/**/*.pug')
        .pipe(gulp.dest('./out/src/pug'));
});

gulp.task('src', gulp.series('src-sass', 'src-html', 'src-fonts', 'src-img', 'src-babel', 'src-babel-modules', 'src-babel-plugins', 'pug'));

//////////////////////////////////////////////////////////////
/// RUN
//////////////////////////////////////////////////////////////

gulp.task('robots',() => {
    return gulp
        .src('./robots.txt')
        .pipe(gulp.dest('./out'));
});

gulp.task('sitemap',() => {
    return gulp
        .src('./public/sitemap.xml')
        .pipe(gulp.dest('./out/public'));
});

gulp.task('default', gulp.series('public', 'src', 'robots', 'sitemap'));