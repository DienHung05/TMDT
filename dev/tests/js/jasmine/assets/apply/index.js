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
    'tests/assets/apply/components/fn',
    'text!./config.json',
    'text!./templates/node.html'
], function (tools, fnComponent, config, nodeTmpl) {
    'use strict';

    var preset;

    preset = tools.init(config, {
        'fn': nodeTmpl
    });

    preset.fn.component = fnComponent;

    return preset;
});
