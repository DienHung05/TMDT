/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/*eslint max-nested-callbacks: 0*/
define([
    'Magento_Ui/js/form/adapter'
], function (obj) {
    'use strict';

    describe('Magento_Ui/js/form/adapter', function () {
        describe('"on" method', function () {
            it('Check for defined ', function () {
                expect(obj.hasOwnProperty('on')).toBeDefined();
            });
            it('Check method type', function () {
                var type = typeof obj.on;

                expect(type).toEqual('function');
            });
        });
    });
});
