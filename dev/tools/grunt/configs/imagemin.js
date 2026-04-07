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

var svgo = require('imagemin-svgo');

/**
 * Images optimization.
 */
module.exports = {
    png: {
        options: {
            optimizationLevel: 7
        },
        files: [{
            expand: true,
            src: ['**/*.png'],
            ext: '.png'
        }]
    },
    jpg: {
        options: {
            progressive: true
        },
        files: [{
            expand: true,
            src: ['**/*.jpg'],
            ext: '.jpg'
        }]
    },
    gif: {
        files: [{
            expand: true,
            src: ['**/*.gif'],
            ext: '.gif'
        }]
    },
    svg: {
        options: {
            use: [svgo()]
        },
        files: [{
            expand: true,
            src: ['**/*.svg'],
            ext: '.svg'
        }]
    }
};
