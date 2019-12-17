	module.exports = function (grunt) {
	var phpMiddleware = require('connect-php');

	var jsFiles = [
	'../assets/js/*.js',
];
	
	// Initial config of grunt
	grunt.initConfig ({
		// Config grunt tasks
		pkg: grunt.file.readJSON('package.json'),

		// concat
		concat : {
			dist : {
				// At the src attr, you will config the path of the paste that you want to concat your css files
				src : ['../assets/_css/**/*.css'],
				dest : '../style.css'
			}
		}, // end of concat

		// cssmin
		// cssmin : {
		// 	add_banner : {
		// 		// options : {
		// 		// 	banner : '/* \n' +
		// 		// 			 'Theme Name: <%= pkg.name %> \n' +
		// 		// 			 'Author: <%= pkg.author %> \n' +
		// 		// 			 'Author URI: <%= pkg.author_uri %> \n' +
		// 		// 			 'Text Domain: <%= pkg.domain %> \n' +
		// 		// 			 'Description: <%= pkg.description %> \n' +
		// 		// 			 'Version: <%= pkg.version %> \n' +
		// 		// 			 '*/'
		// 		// },

		// 		files : {
		// 			// The cssmin task will minify all your css file
		// 			'../style.css' : ['../style.css']
		// 		}
		// 	}
		// }, // end of cssmin

		// watch
		watch : {
			options: {
				livereload: true
			},

			js: {
				files: [jsFiles]
			},

			css: {
				files: '../assets/_css/**/*.css',
				tasks: ['concat']
			},

			php: {
				files: '../*.php'
			},

			html: {
				files: '../*.html'
			}

		}, // end of watch

		// connect
		connect: {
			server: {
				options: {
					port: 9000,
					livereload: 35729,
					hostname: 'localhost',
					open: true,
					base: '../',
					middleware: function(connect, options) {
					   // Same as in grunt-contrib-connect
					  var middlewares = [];
					  var directory = options.directory ||
					    options.base[options.base.length - 1];
					  if (!Array.isArray(options.base)) {
					    options.base = [options.base];
					  }

					  // Here comes the PHP middleware
					  middlewares.push(phpMiddleware(directory));

					    // Same as in grunt-contrib-connect
					  options.base.forEach(function(base) {
					    middlewares.push(connect.static(base));
					  });

					  middlewares.push(connect.directory(directory));
					  return middlewares;
					}
				}
			}
		} // end of connect

	}); // End of initial config of grunt

	// Loading grunt tasks
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-connect');

	// Config grunt command tasks
	grunt.registerTask('default', ['concat']);
	grunt.registerTask('w', ['connect', 'watch']);
};