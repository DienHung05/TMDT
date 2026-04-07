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

var tasks = {};

function init(config) {
    var serveStatic = require('serve-static'),
        grunt       = require('grunt'),
        _           = require('underscore'),
        path        = require('path'),
        ignoredPaths, middleware, themes, files, port;

    port         = config.port;
    files        = config.files;
    themes       = config.themes;
    ignoredPaths = config.server.serveAsIs;

    function serveAsIs(path) {
        return ignoredPaths.some(function (ignoredPath) {
            return new RegExp(ignoredPath).test(path);
        });
    }

    middleware = function (connect, options, middlewares) {
        var server = serveStatic(process.cwd());

        middlewares.unshift(function (req, res, next) {
            var url = req.url;

            if (serveAsIs(url)) {
                return server.apply(null, arguments);
            }

            return next();
        });

        return middlewares;
    };

    _.each(themes, function (themeData, themeName) {
        var options = {
            base: _.template(config.server.base)(themeData),
            port: port++,
            middleware: middleware
        };

        _.defaults(options, config.server.options);

        tasks[themeName] = { options: options };
    });
}

function getTasks() {
    return tasks;
}

module.exports = {
    init: init,
    getTasks: getTasks
};
