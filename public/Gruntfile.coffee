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
                    {expand: true, flatten: true, src: ["lib/js/plugins/*"], dest: 'dist/js/lib/plugins/'}
                    {expand: true, flatten: true, src: ["src/pages/**/*.js"], dest: 'dist/js/pages/'}
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
                    'dist/js/mycomponents.js': ['src/components/**/*.js'],
                    'dist/js/common.js': ['src/common/**/*.js'],
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
                    'dist/css/layouts.css':['src/layouts/*.less']
            pages:
                files:
                    'dist/css/admin/home/scroll-poster.css': ['src/pages/admin/home/scroll-poster.less']
                    'dist/css/admin/home/contact-us.css': ['src/pages/admin/home/contact-us.less']
                    'dist/css/admin/home/friend-links.css': ['src/pages/admin/home/friend-links.less']
                    'dist/css/apply/apply-online/apply-online.css':['src/pages/apply/apply-online/apply-online.less']
                    'dist/css/apply/query-score/query-score.css':['src/pages/apply/query-score/query-score.less']
                    'dist/css/certification/identity/identity.css':['src/pages/certification/identity/identity.less']
                    'dist/css/certification/certification.css':['src/pages/certification/certification.less']
                    'dist/css/communication/enlighten/enlighten.css':['src/pages/communication/enlighten/enlighten.less']
                    'dist/css/communication/masterdynamic/masterdynamic.css':['src/pages/communication/masterdynamic/masterdynamic.less']
                    'dist/css/communication/societydynamic/societydynamic.css':['src/pages/communication/societydynamic/societydynamic.less']
                    'dist/css/communication/topics/topic.css':['src/pages/communication/topics/topics.less']
                    'dist/css/home/home.css':['src/pages/home/home.less']
                    'dist/css/join/join.css':['src/pages/join/join.less']
                    'dist/css/home/society-show/comedy/comedy.css':['src/pages/home/society-show/comedy/comedy.less']
                    'dist/css/home/society-show/comedy/comedy-details.css':['src/pages/home/society-show/comedy/comedy-details.less']
                    'dist/css/home/society-show/comedy/classic-case.css':['src/pages/home/society-show/comedy/classic-case.less']
                    'dist/css/home/society-show/comedy/before-behind.css':['src/pages/home/society-show/comedy/before-behind.less']
                    'dist/css/userCenter/zone/zone.css':['src/pages/userCenter/zone/zone.less']
                    'dist/css/userCenter/photo-album/photo-album.css':['src/pages/userCenter/photo-album/photo-album.less']
                    'dist/css/userCenter/message/message.css':['src/pages/userCenter/message/message.less']
                    'dist/css/userCenter/information/information.css':['src/pages/userCenter/information/information.less']
                    'dist/css/userCenter/dynamic/dynamic.css':['src/pages/userCenter/dynamic/dynamic.less']
                    'dist/css/login/login.css':['src/pages/login/login.less']

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

