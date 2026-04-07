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
    'underscore',
    'uiLayout'
], function (_, layout) {
    'use strict';

    describe('Magento_Ui/js/core/layout', function () {
        var layoutObj;

        beforeEach(function () {
            layoutObj = layout;
        });
        it('is executable', function () {
            expect(typeof layoutObj).toEqual('function');
        });
    });
});
