/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

'use strict';

var tasks = [],
    _ = require('underscore');

function init(grunt, options) {
    var _                   = require('underscore'),
<<<<<<< HEAD
        stripComments       = require('strip-comments'),
=======
        stripJsonComments   = require('strip-json-comments'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        path                = require('path'),
        config,
        themes,
        file;

    config = grunt.file.read(__dirname + '/settings.json');
<<<<<<< HEAD
    config = stripComments(config);
=======
    config = stripJsonComments(config);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    config = JSON.parse(config);

    themes = require(path.resolve(process.cwd(), config.themes));

    if (options.theme) {
        themes = _.pick(themes, options.theme);
    }

    tasks = Object.keys(themes);

    config.themes = themes;

    file = grunt.option('file');

    if (file) {
        config.singleTest = file;
    }

    enableTasks(grunt, config);
}

function enableTasks(grunt, config) {
    var jasmine = require('./tasks/jasmine'),
        connect = require('./tasks/connect');

    jasmine.init(config);
    connect.init(config);

    grunt.initConfig({
        jasmine: jasmine.getTasks(),
        connect: connect.getTasks()
    });
}

function getTasks() {
    tasks = tasks.map(function (theme) {
        return [
            'connect:' + theme,
            'jasmine:' + theme
        ];
    });

    return _.flatten(tasks);
}

module.exports = {
    init: init,
    getTasks: getTasks
};
