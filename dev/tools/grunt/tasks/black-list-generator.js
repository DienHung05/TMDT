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

    var glob = require('glob'),
        fs = require('fs'),
        path = require('path'),
        fst = require('../tools/fs-tools.js'),
        pc = require('../configs/path');

    grunt.registerTask('black-list-generator', function () {
        process.chdir(grunt.option('dir') || '.');

        var whiteListFile = glob.sync(pc.static.whitelist + '*.txt')[0],
            blacklistFile = pc.static.blacklist + path.basename(whiteListFile),
            whiteList = fst.getData(whiteListFile);

        fst.arrayRead(whiteList, function (data) {
            fst.write(blacklistFile, data);
        });
    });
};
