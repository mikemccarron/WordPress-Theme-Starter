/*
Required Dependencies
*/
var gulp 			= require('gulp'),
	plumber			= require('gulp-plumber'),
	sass 			= require('gulp-sass'),
	csso 			= require('gulp-csso'),
	notify 			= require('gulp-notify'),
	jshint 			= require('gulp-jshint'),
	uglify 			= require('gulp-uglify'),
	autoprefixer	= require('gulp-autoprefixer'),
	imagemin 		= require('gulp-imagemin'),
	concat 			= require('gulp-concat'),
	stylish 		= require('jshint-stylish'),
	sourcemaps 		= require('gulp-sourcemaps');

/*
Settings
*/
var settings = {
	dist: '../',
	prod: ''
}

gulp.task('default', ['watcher']);

gulp.task('watcher', function() {
	console.log('\nOkay, we are now watching for changes...');
	console.log(settings);

	gulp.watch( settings.prod + 'sass/**/*.scss', ['css-compile', 'css-prefix', 'css-compress'] );

	gulp.watch( settings.prod + 'js/*.js', ['js-compile', 'js-compress'] );
	gulp.watch( settings.prod + 'js/plugins/*.js', ['js-concat-plugins'] );
	gulp.watch( settings.prod + 'js/libs/*.js', ['js-move-libs'] );

	gulp.watch([
		settings.dist + '**/*.jpg',
		settings.dist + '**/*.gif',
		settings.dist + '**/*.png',
		settings.dist + '**/*.svg'
	], ['images-minify'] );

});

/*
CSS / SCSS
*/
gulp.task('css-compile', function(){
	console.log('\nCSS: Compiling...');
	return gulp.src( settings.prod + 'sass/**/*.scss')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( sass({
				sourcemap: true,
				errLogToConsole: true,
			})
		)
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist ));
});

gulp.task('css-prefix', ['css-compile'], function(){
	console.log('\nCSS: Adding vendor prefixes...');
	return gulp.src( settings.dist + '*.css')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( autoprefixer({
				browsers: ['last 2 versions']
			})
		)
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist ));
});

gulp.task('css-compress', ['css-compile', 'css-prefix'], function(){
	console.log('\nCSS: Compressing final output...');
	return gulp.src( settings.dist + '*.css')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( csso({
			sourceMap: true,
			debug: true
		}) )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist ));
});

/*
JavaScript
*/
gulp.task('js-compile', function(){
	console.log('\nJS: Compiling...');
	return gulp.src( settings.prod + 'js/*.js')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( jshint() )
		.pipe( jshint.reporter('jshint-stylish') )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist + 'js' ));
});

gulp.task('js-compress', ['js-compile'], function(){
	console.log('\nJS: Compressing final output...');
	return gulp.src( settings.dist + 'js/*.js')
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( sourcemaps.init() )
		.pipe( uglify({
				mangle: true,
				preserveComments: 'license'
			})
		)
		.pipe( sourcemaps.write() )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist + 'js' ));
});

gulp.task('js-concat-plugins', function(){
	console.log('\nJS: Concat plugins...');
	return gulp.src( settings.prod + 'js/plugins/*.js' )
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( sourcemaps.init() )
		.pipe( concat('plugins.js') )
		.pipe( sourcemaps.write() )
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist + 'js/plugins' ));
});

gulp.task('js-move-libs', function(){
	console.log('\nJS: A new library was found. Moving it to our theme...');
	return gulp.src( settings.prod + 'js/libs/*.js' )
		.pipe( plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist + 'js/libs' ));
});


/*
Images
*/
gulp.task('images-minify', function() {
	return gulp.src( settings.dist + '**/*')
		.pipe( plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe( imagemin({
				progressive: true,
				mutlipass: true
			})
		)
		.pipe( plumber.stop() )
		.pipe( gulp.dest( settings.dist ));
});