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

    var pc = require('../configs/path'),
        fs = require('fs'),
        cvf = require('../tools/collect-validation-files'),
        setConfig = function (task, target, data) {
            var config = grunt.config.get(task);

            config[target].src = data;
<<<<<<< HEAD
            // Add parser options to support ES6+ features (spread operators, etc.)
            if (task === 'eslint' && config[target].options) {
                // Merge overrideConfig if it exists, otherwise create it
                if (!config[target].options.overrideConfig) {
                    config[target].options.overrideConfig = [];
                }
                // Add language options to support ES2021 features
                config[target].options.overrideConfig.push({
                    languageOptions: {
                        ecmaVersion: 2021,
                        sourceType: 'script'
                    }
                });
            }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            grunt.config.set(task, config);
        };

    grunt.registerTask('static', function (target) {
        var currentTarget = target || 'file',
            file = grunt.option('file'),
            tasks = [
                'continue:on',
                'eslint:' + currentTarget,
                'continue:off',
                'continue:fail-on-warning'
            ];

        setConfig('eslint', currentTarget, cvf.getFiles(file));
        grunt.task.run(tasks);

        if (!grunt.option('file')) {
            fs.unlinkSync(pc.static.tmp);
        }
    });
};
