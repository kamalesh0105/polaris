module.exports = function (grunt) {
  grunt.initConfig({
    concat: {
      options: {
        separator: "\n",
        sourceMap: true,
        banner: "/*made by jarvis*/",
      },
      css: {
        src: ["../css/**/*.css"],
        dest: "dist/style.css",
      },
      js: {
        src: ["bower_components/jquery/dist/jquery.js", "../js/**/*.js"],
        dest: "dist/app.js",
      },
    },

    cssmin: {
      options: {
        mergeIntoShorthands: false,
        roundingPrecision: -1,
      },
      target: {
        files: {
          "../../htdocs/css/style.css": ["dist/style.css"],
        },
      },
    },
    uglify: {
      my_target: {
        options: {
          sourceMap: true,
        },
        files: {
          "../../htdocs/js/app.min.js": ["dist/app.js"],
        },
      },
    },
    copy: {
      jquery: {
        //     expand: true,
        //     flatten: true,
        //     filter: 'isFile',
        //     src: 'bower_components/jquery/dist/*',
        //     dest: '../../htdocs/js/jquery/',
      },
    },
    obfuscator: {
      options: {
        banner: "// obfuscated with grunt-contrib-obfuscator.\n",
        //debugProtection: true,
        //debugProtectionInterval: true,
        //domainLock: ["localhost"],
      },
      task1: {
        options: {
          // options for each sub task
        },
        files: {
          "../../htdocs/js/app.o.js": ["dist/app.js"],
        },
      },
    },
    watch: {
      css: {
        files: ["../css/**/*.css"],
        tasks: ["concat:css", "mincss"],
        options: {
          spawn: false,
        },
      },
      js: {
        files: ["../js/**/*.js"],
        tasks: ["concat:js", "uglify", "obfuscator"],
        options: {
          spawn: false,
        },
      },
    },
  });

  //grunt.registerTask('helloworld', function () {
  //console.log("I am grunt running...");
  //})
  grunt.loadNpmTasks("grunt-contrib-obfuscator");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-copy");

  grunt.registerTask("css", ["concat:css", "cssmin"]);
  grunt.registerTask("js", ["concat:js", "uglify", "obfuscator"]);
  grunt.registerTask("default", [
    "copy",
    "concat",
    "cssmin",
    "uglify",
    "obfuscator",
    "watch",
  ]);
};
