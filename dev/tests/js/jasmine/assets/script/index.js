/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
define([
    'tests/assets/tools',
    'text!./config.json',
    'text!./templates/selector.html',
    'text!./templates/virtual.html'
], function (tools, config, selectorTmpl, virtualTmpl) {
    'use strict';

    return tools.init(config, {
        bySelector: selectorTmpl,
        virtual: virtualTmpl
    });
});
