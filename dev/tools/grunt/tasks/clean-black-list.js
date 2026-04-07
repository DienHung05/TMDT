/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

module.exports = function (grunt) {
    'use strict';

    var fs = require('fs'),
        _ = require('underscore'),
        glob = require('glob'),
        fst = require('../tools/fs-tools'),
        pc = require('../configs/path'),
        removeFromFile = function (path, files) {
            var data = _.difference(fst.getData(path), files);

            fst.write(path, data);
        };

    grunt.registerTask('clean-black-list', function () {
        process.chdir(grunt.option('dir') || '.');

        var filesToRemove = grunt.option('file').split(','),
            files = glob.sync(pc.static.blacklist + '*.txt');

        _.each(files, function (file) {
            removeFromFile(file, filesToRemove);
        });
    });
};
