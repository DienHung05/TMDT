/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/* eslint-disable strict */
define([], function () {
    var baseUrl = '';

    return {
        /**
         * @param {String} url
         */
        setBaseUrl: function (url) {
            baseUrl = url;
        },

        /**
         * @param {String} path
         * @return {*}
         */
        build: function (path) {
            if (path.indexOf(baseUrl) !== -1) {
                return path;
            }

            return baseUrl + path;
        }
    };
});
