/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
define(function (require) {
    'use strict';

    var utils = {},
        _ = require('underscore'),
        root = typeof self == 'object' && self.self === self && self ||
            typeof global == 'object' && global.global === global && global ||
            Function('return this')() || {};

    root._ = _;

    return _.extend(
        utils,
        require('./arrays'),
        require('./compare'),
        require('./misc'),
        require('./objects'),
        require('./strings'),
        require('./template')
    );
});
