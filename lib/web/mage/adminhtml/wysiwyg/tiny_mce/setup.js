/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/* eslint-disable strict */
define([
    'jquery',
    'underscore',
    'wysiwygAdapter',
    'module',
    'mage/translate',
    'prototype',
    'mage/adminhtml/events',
    'mage/adminhtml/browser'
], function (jQuery, _, wysiwygAdapter, module) {
    var baseConfig = module.config().config || {},
        wysiwygSetup = Class.create({
        wysiwygInstance: null
    });

    wysiwygSetup.prototype = {

        /**
         * @param {*} htmlId
         * @param {Object} config
         */
        initialize: function (htmlId, config) {
            var WysiwygInstancePrototype = new wysiwygAdapter.getAdapterPrototype();

            _.bindAll(this, 'openFileBrowser');

            config = _.extend({}, baseConfig, config || {});
            this.wysiwygInstance = new WysiwygInstancePrototype(htmlId, config);
            this.wysiwygInstance.eventBus = this.eventBus = new window.varienEvents();
        },

        /**
         * @param {*} mode
         */
        setup: function (mode) {
            this.wysiwygInstance.setup(mode);
        },

        /**
         * @param {Object} o
         */
        openFileBrowser: function (o) {
            this.wysiwygInstance.openFileBrowser(o);
        },

        /**
         * @return {Boolean}
         */
        toggle: function () {
            return this.wysiwygInstance.toggle();
        },

        /**
         * On form validation.
         */
        onFormValidation: function () {
            this.wysiwygInstance.onFormValidation();
        },

        /**
         * Encodes the content so it can be inserted into the wysiwyg
         * @param {String} content - The content to be encoded
         *
         * @returns {*} - The encoded content
         */
        updateContent: function (content) {
            return this.wysiwygInstance.encodeContent(content);
        }

    };
    window.wysiwygSetup = wysiwygSetup;

    return wysiwygSetup;
});
