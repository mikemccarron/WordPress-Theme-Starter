/*
Required Dependencies
*/
var gulp 		= require('gulp'),
	plumber 	= require('gulp-plumber'),
	babel 		= require('gulp-babel'),
	babelCore 	= require('babel-core'),
	babelPoly 	= require('babel-polyfill'),
	concat 		= require('gulp-concat'),
	sourcemaps 	= require('gulp-sourcemaps'),
	jshint 		= require('gulp-jshint'),
	uglify 		= require('gulp-uglify'),
	sass 		= require('gulp-sass'),
	csso 		= require('gulp-csso'),
	svgsprites	= require("gulp-svg-sprites"),
	prefixer 	= require('gulp-autoprefixer'),
	notify 		= require("gulp-notify"),
	browserSync = require("browser-sync").create();

/*
Settings
*/
var localhost = "http://localhost/";
var basePaths = {
	prod: "",
	dist: "../dist/",
	distroot: "../dist/"
}

var settings = {
	"javascript":{
		prod: basePaths.prod + 'scripts/',
		dist: basePaths.dist + 'assets/scripts/',
		compiler: ''

	},
	"css":{
		prod: basePaths.prod + 'styles/',
		dist: basePaths.dist + 'assets/styles/'
	},
	"images":{
		prod: basePaths.prod + 'assets/',
		dist: basePaths.dist + 'assets/'
	}
}

gulp.task('default', ['watch']);

gulp.task('watch', function() {
	// Init BrowserSync
	browserSync.init({ proxy: localhost });

	// Watching for JS changes.
	gulp.watch( settings["javascript"].prod + 'plugins/*.js', ['js-concat', 'js-compress-plugins']);

	gulp.watch(
		[
			settings["javascript"].prod + '**/*.js',
			'!' + settings["javascript"].prod + 'plugins/*.js'
		],
		['js']
	);

	// Render SVG Sprites
	gulp.watch( settings["css"].prod +'**/*.scss', ['sass', 'css-prefix']);

	// Rendering CSS
	gulp.watch( settings["images"].prod +'svgs/*.svg', ['build-svg-sprite']);

	// Reload page when .html files change
	gulp.watch(basePaths.distroot + "templates/**/*.html").on('change', browserSync.reload);
});

/* ------------------------------
SVG Spritesheets
------------------------------*/
gulp.task('build-svg-sprite', function () {
	return gulp.src( settings["images"].prod +'svgs/*.svg' )
		.pipe( svgsprites({
			mode: "symbols"
		}))
		.pipe( gulp.dest( settings["images"].dist + 'vectorsprites/' ));
});

/* ------------------------------
JS
------------------------------*/
gulp.task('js', function() {
	console.log('Running gulp.task: js');

	return gulp.src([
			'!' + settings["javascript"].prod + 'plugins/*.js',
			settings["javascript"].prod + 'modules/*.js',
			settings["javascript"].prod + '*.js'

		])
		.pipe( plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}) )
		.pipe( sourcemaps.init() )
		.pipe( jshint() )
		.pipe( concat('app.js') )
		.pipe( babel({ presets: ['env'] }))
		.pipe( sourcemaps.write('.') )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings["javascript"].dist ))
		.pipe(browserSync.stream());
});

gulp.task('js-compress', function(){
	return gulp.src( settings["javascript"].dist +'**/*.js')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>")} ))
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings["javascript"].dist ));
});

gulp.task('js-compress-plugins', function(){
	return gulp.src( settings["javascript"].dist +'plugins/plugins.js')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>")} ))
		.pipe( plumber.stop() )
		.pipe( uglify() )
		.pipe( gulp.dest( settings["javascript"].dist + 'plugins' ));
});

gulp.task('js-concat', function() {
	return gulp.src( settings["javascript"].prod+'plugins/*.js' )
		.pipe( concat('plugins.js'))
		.pipe( gulp.dest( settings["javascript"].dist + 'plugins' ))
		.pipe(browserSync.stream());
});

/* ------------------------------
CSS
------------------------------*/
gulp.task('sass', function() {
	return gulp.src( settings["css"].prod + '**/*.scss')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>")} ))
		.pipe( sass({
				sourcemap: true,
				errLogToConsole: true,
				outputStyle: 'compressed',
			})
		)
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings["css"].dist ));
});

gulp.task('css-prefix', ['sass'], function () {
	return gulp.src( settings["css"].dist + '*.css')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>")} ))
		.pipe( prefixer({ browsers: ['last 2 versions', '> 5%', 'Explorer > 10'] }))
		.pipe( csso() )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings["css"].dist ) )
		.pipe(browserSync.stream());
});