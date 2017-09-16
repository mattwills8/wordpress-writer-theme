// Gulp.js configuration
'use strict';


/*
** SETTINGS
*/



const

    themeName           = 'Writer',
    MAMPDirectoryName   = 'Jess',
    FTPDirectoryPath    = `/httpdocs/wp-content/themes/${themeName}/`
;


var

    // source and build folders
    dir = {
        src             : 'src/',
        build           : 'build/',
        home            : process.env.HOME || process.env.HOMEPATH || process.env.USERPROFILE, //users/yourname
        localhostThemeRoot :  `/Applications/MAMP/htdocs/${MAMPDirectoryName}/wp-content/themes/${themeName}/`
    }
    dir.root = dir.build + '../';
    dir.localhostBuild = dir.localhostThemeRoot;

const
      
    // Gulp and plugins
    gulp          = require('gulp'),
    gutil         = require('gulp-util'),
    gulpSequence  = require('gulp-sequence'),
    fs            = require('fs'),
    through       = require('through2'),
    time          = require('time')(Date), //extends global date object
    mtime         = require('gulp-mtime-correction'),
    {phpMinify}   = require('@cedx/gulp-php-minify'),
    newer         = require('gulp-newer'),
    changed       = require('gulp-changed'),
    imagemin      = require('gulp-imagemin'),
    sass          = require('gulp-sass'),
    postcss       = require('gulp-postcss'),
    deporder      = require('gulp-deporder'),
    concat        = require('gulp-concat'),
    stripdebug    = require('gulp-strip-debug'),
    uglify        = require('gulp-uglify'),
    zip           = require('gulp-zip'),
    del           = require('del'),
    ftp           = require('vinyl-ftp'),
    mamp          = require('gulp-mamp')
;



// PHP settings
const php = {
    src           : dir.src + 'theme/**/*.php',
    build         : dir.build
};


// image settings
const images = {
    src         : dir.src + 'img/**/*',
    build       : dir.build + 'assets/img/',
    localhostBuild : dir.localhostBuild + 'assets/img/'
};


// CSS settings
var css = {
    src         : dir.src + 'scss/main.scss',
    watch       : dir.src + 'scss/**/*',
    build       : dir.build + 'assets/css/',
    localhostBuild : dir.localhostBuild + 'assets/css/',
    sassOpts: {
        outputStyle     : 'nested',
        imagePath       : images.build,
        precision       : 3,
        errLogToConsole : true
    },
    processors: [
        require('postcss-assets')({
            loadPaths: ['img/'],
            basePath: dir.build,
            baseUrl: dir.build + '../'
        }),
        require('autoprefixer')({
            browsers: ['last 2 versions', '> 2%']
        }),
        require('css-mqpacker'),
        require('cssnano')
  ]
};


// JavaScript settings
const js = {
    src         : dir.src + 'js/**/*',
    build       : dir.build + 'assets/js/',
    localhostBuild : dir.localhostBuild + 'assets/js/',
    filename    : 'main.js'
};


//zip settings
const zipOpts = {
    productionZipName   : themeName,
    productionZipFiles  : [
        dir.build + '**/*'
    ]
};


// FTP settings
const FTP = {
    connOpts : {
        host        : 'ftp.example.co.uk',
        user        : 'example',
        password    : 'password',
        parallel    : 10,
        log         : gutil.log
    },
    directoryPath       : FTPDirectoryPath,
    src                 : dir.build + '**/*',
    base                : dir.build,
    serverTzDifference  : 0
};

 

// Browsersync settings
var browsersync = false;
const syncOpts = {
    proxy       : 'localhost',
    files       : dir.localhostThemeRoot,
    open        : false,
    notify      : false,
    ghostMode   : false,
    ui: {
        port: 8001
    }
};







/*
** TASKS
*/


// copy PHP files
gulp.task('php', () => {
  return gulp.src(php.src, {read: false})
    .pipe(newer(php.build))
    .pipe(phpMinify())
    .pipe(gulp.dest(php.build))
});

// copy PHP files to localhost folder
gulp.task('php:localhost', () => {
  return gulp.src(php.src, {read: false})
    .pipe(newer(dir.localhostThemeRoot))
    .pipe(phpMinify())
    .pipe(gulp.dest(dir.localhostThemeRoot))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});



// image processing
gulp.task('images', () => {
  return gulp.src(images.src)
    .pipe(newer(images.build))
    .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 6}),
        imagemin.svgo({plugins: [{removeViewBox: true}]})
    ]))
    .pipe(gulp.dest(images.build));
});

// image processing to localhost folder
gulp.task('images:localhost', () => {
  return gulp.src(images.src)
    .pipe(newer(images.build))
    .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 6}),
        imagemin.svgo({plugins: [{removeViewBox: true}]})
    ]))
    .pipe(gulp.dest(images.localhostBuild));
});



// CSS processing
gulp.task('css', ['images'], () => {
  return gulp.src(css.src)
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(gulp.dest(css.build))
});

// CSS processing to localhost folder
gulp.task('css:localhost', ['images:localhost'], () => {
  return gulp.src(css.src)
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(gulp.dest(css.localhostBuild))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});



// JavaScript processing
gulp.task('js', () => {
  return gulp.src(js.src)
    .pipe(deporder())
    .pipe(concat(js.filename))
    //.pipe(stripdebug())
    .pipe(uglify())
    .pipe(gulp.dest(js.build))
});

// JavaScript processing to localhost folder
gulp.task('js:localhost', () => {
  return gulp.src(js.src)
    .pipe(deporder())
    .pipe(concat(js.filename))
    //.pipe(stripdebug())
    //.pipe(uglify())
    .pipe(gulp.dest(js.localhostBuild))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});






//watch without browsersync - updates build and localhost
gulp.task('watch', () => {

  // page changes
  gulp.watch(php.src, ['php', 'php:localhost']);

  // image changes
  gulp.watch(images.src, ['images', 'images:localhost']);

    // CSS changes
  gulp.watch(css.watch, ['css', 'css:localhost']);

  // JavaScript main changes
  gulp.watch(js.src, ['js', 'js:localhost']);
    
});


// browser-sync initiation
gulp.task('browsersync:init', () => {
  if (browsersync === false) {
    browsersync = require('browser-sync').create();
    browsersync.init(syncOpts);
  }
});

// watch with browsersync running
gulp.task('browsersync', ['browsersync:init', 'watch']);







// gulp clean production zip
gulp.task('clean:zip', () => {
  return del([
      '{'+zipOpts.productionZipName+'/**,'+zipOpts.productionZipName+'}',
      zipOpts.productionZipName + '.zip'
  ]);
});


// create theme production zip file  (replacing any old ones)
gulp.task('zip', ['clean:zip'], () => {
  return gulp.src(zipOpts.productionZipFiles) 
    .pipe(zip(zipOpts.productionZipName + '.zip'))
    .pipe(gulp.dest(dir.root));
});





// move timezone of build folder files forward to match live server
gulp.task('tz:forward', () => {
    
    gutil.log('Moving build folder forward');
    
    return gulp.src(dir.build + '/**/*')
    .pipe(mtime(FTP.serverTzDifference))
    .pipe(gulp.dest(dir.build));
});

// move timezone of build folder files back to local time
gulp.task('tz:back', () => {
    
    gutil.log('Moving build folder back');
    
    return gulp.src(dir.build + '/**/*')
    .pipe(mtime(-FTP.serverTzDifference))
    .pipe(gulp.dest(dir.build));
});





// ftp deployment to live site
gulp.task( 'deploy', () => {
 
    var conn = ftp.create( FTP.connOpts );
 
    // turn off buffering in gulp.src for best performance 
    return gulp.src( FTP.src , { base: FTP.base, buffer: false } )
        .pipe( conn.newer( FTP.directoryPath ) ) // only upload newer files 
        .pipe( conn.dest( FTP.directoryPath ) );
} );


// ftp deployment allowing for timezone difference
gulp.task( 'ftp', gulpSequence('tz:forward','deploy','tz:back'));






// build
gulp.task('build', ['php', 'css', 'js', 'build:localhost']);
gulp.task('build:localhost', ['php:localhost', 'css:localhost', 'js:localhost']);


// commit - commits build folder in current state to live site and zip
gulp.task('commit', gulpSequence('build',['ftp','zip']));


// default task - builds everything, initiates local server and watches with browsersync active
gulp.task('default', gulpSequence('build', 'browsersync'));