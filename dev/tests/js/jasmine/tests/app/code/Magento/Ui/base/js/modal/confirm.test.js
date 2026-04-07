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
    'jquery',
    'Magento_Ui/js/modal/confirm'
], function ($) {
    'use strict';

    describe('ui/js/modal/confirm', function () {
        var element = $('<div>some element</div>'),
            confirm = element.confirm({});

        it('Check for modal definition', function () {
            expect(confirm).toBeDefined();
        });
        it('Show/hide function check', function () {
            expect(element.trigger('openModal')).toBe(element);
            expect(element.trigger('closeModal')).toBe(element);
        });
        it('Integration: modal created on page', function () {
            expect(confirm.length).toEqual(1);
        });
    });
});
