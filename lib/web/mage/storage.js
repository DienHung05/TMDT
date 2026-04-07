/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

define(['jquery', 'mage/url'], function ($, urlBuilder) {
    'use strict';

    return {
        /**
         * Perform asynchronous GET request to server.
         * @param {String} url
         * @param {Boolean} global
         * @param {String} contentType
         * @param {Object} headers
         * @returns {Deferred}
         */
        get: function (url, global, contentType, headers) {
            headers = headers || {};
            global = global === undefined ? true : global;
            contentType = contentType || 'application/json';

            return $.ajax({
                url: urlBuilder.build(url),
                type: 'GET',
                global: global,
                contentType: contentType,
                headers: headers
            });
        },

        /**
         * Perform asynchronous POST request to server.
         * @param {String} url
         * @param {String} data
         * @param {Boolean} global
         * @param {String} contentType
         * @param {Object} headers
<<<<<<< HEAD
         * @param {Boolean} async
         * @returns {Deferred}
         */
        post: function (url, data, global, contentType, headers, async) {
            headers = headers || {};
            global = global === undefined ? true : global;
            contentType = contentType || 'application/json';
            async = async === undefined ? true : async;
=======
         * @returns {Deferred}
         */
        post: function (url, data, global, contentType, headers) {
            headers = headers || {};
            global = global === undefined ? true : global;
            contentType = contentType || 'application/json';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

            return $.ajax({
                url: urlBuilder.build(url),
                type: 'POST',
                data: data,
                global: global,
                contentType: contentType,
<<<<<<< HEAD
                headers: headers,
                async: async
=======
                headers: headers
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            });
        },

        /**
         * Perform asynchronous PUT request to server.
         * @param {String} url
         * @param {String} data
         * @param {Boolean} global
         * @param {String} contentType
         * @param {Object} headers
         * @returns {Deferred}
         */
        put: function (url, data, global, contentType, headers) {
            var ajaxSettings = {};

            headers = headers || {};
            global = global === undefined ? true : global;
            contentType = contentType || 'application/json';
            ajaxSettings.url = urlBuilder.build(url);
            ajaxSettings.type = 'PUT';
            ajaxSettings.data = data;
            ajaxSettings.global = global;
            ajaxSettings.contentType = contentType;
            ajaxSettings.headers = headers;

            return $.ajax(ajaxSettings);
        },

        /**
         * Perform asynchronous DELETE request to server.
         * @param {String} url
         * @param {Boolean} global
         * @param {String} contentType
         * @param {Object} headers
         * @returns {Deferred}
         */
        delete: function (url, global, contentType, headers) {
            headers = headers || {};
            global = global === undefined ? true : global;
            contentType = contentType || 'application/json';

            return $.ajax({
                url: urlBuilder.build(url),
                type: 'DELETE',
                global: global,
                contentType: contentType,
                headers: headers
            });
        }
    };
});
