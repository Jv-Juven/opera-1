module.exports = (grunt)->

    stringify = require 'stringify'
    coffeeify = require 'coffeeify'

    grunt.initConfig
        concurrent:
            dev:
                tasks: ["nodemon", "watch"]
                options:
                    logConcurrentOutput: true
        copy:
            dev:
                files: [
                    {expand: true, flatten: true, src: ["lib/js/jquery/*"], dest: 'dist/js/lib/jquery/'}
                ]

        clean:
            dist: ['dist']

        browserify:
            components:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                files: {
                    'dist/js/components.js': ['src/components/**/*.coffee'],
                }

            pages:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                src: ['src/pages/**/*.coffee']
                dest: 'dist/js/pages/'
                ext: '.js'

        watch:
            compile:
                options:
                    livereload: 1337
                files: ['src/**/*.less', 'src/**/*.coffee']
                tasks: ['browserify', 'less']

        less:
            common:
                files:
                    'dist/css/common.css': ['src/common/**/*.less']

            components:
                files:
                    'dist/css/components.css': ['src/components/**/*.less']
            pages:
                files:
                    'dist/css/admin/login/login.css': ['src/pages/admin/login/login.less']
                    'dist/css/admin/information/info-update.css': ['src/pages/admin/information/info-update.less']
                    'dist/css/admin/information/history-hot.css': ['src/pages/admin/information/history-hot.less']
                    'dist/css/admin/information/history-information.css': ['src/pages/admin/information/history-information.less']
                    'dist/css/admin/information/history-instruction.css': ['src/pages/admin/information/history-instruction.less']
                    'dist/css/admin/information/history-recommend.css': ['src/pages/admin/information/history-recommend.less']

        cssmin:
            main:
                files:[{
                  expand: true,
                  cwd: 'dist/css',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css',
                  ext: '.css'
                }]
            about:
                files:[{
                  expand: true,
                  cwd: 'dist/css/about',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/about',
                  ext: '.css'
                }]
            admin:
                files:[{
                  expand: true,
                  cwd: 'dist/css/admin',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/admin',
                  ext: '.css'
                }]
            checkbox:
                files:[{
                  expand: true,
                  cwd: 'dist/css/checkbox',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/checkbox',
                  ext: '.css'
                }]
            score:
                files:[{
                  expand: true,
                  cwd: 'dist/css/score',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/score',
                  ext: '.css'
                }]
            searchShop:
                files:[{
                  expand: true,
                  cwd: 'dist/css/searchShop',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/searchShop',
                  ext: '.css'
                }]
            account:
                files:[{
                  expand: true,
                  cwd: 'dist/css/tradingCenter/account',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/tradingCenter/account',
                  ext: '.css'
                }]
            mynews:
                files:[{
                  expand: true,
                  cwd: 'dist/css/tradingCenter/mynews',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/tradingCenter/mynews',
                  ext: '.css'
                }]
            sellerCenter:
                files:[{
                  expand: true,
                  cwd: 'dist/css/tradingCenter/seller-center',
                  src: ['*.css', '!*.min.css'],
                  dest: 'dist/css/tradingCenter/seller-center',
                  ext: '.css'
                }]

        uglify:
            pages:
                files:[{
                    expand: true,
                    cwd: 'dist/js/pages',
                    src: '**/*.js',
                    dest: 'dist/js/pages'
                }]
            main:
                files:[{
                    expand: true,
                    cwd: 'dist/js',
                    src: '**/*.js',
                    dest: 'dist/js'
                }]

    grunt.loadNpmTasks 'grunt-browserify'
    grunt.loadNpmTasks 'grunt-contrib-less'
    grunt.loadNpmTasks 'grunt-contrib-copy'
    grunt.loadNpmTasks 'grunt-contrib-clean'
    grunt.loadNpmTasks 'grunt-contrib-watch'
    grunt.loadNpmTasks 'grunt-contrib-uglify'
    grunt.loadNpmTasks 'grunt-contrib-cssmin'
    grunt.loadNpmTasks 'grunt-contrib-less'

    grunt.registerTask 'default', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'watch'
        ]

    grunt.registerTask 'prod', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'uglify'
            'cssmin'
        ]

