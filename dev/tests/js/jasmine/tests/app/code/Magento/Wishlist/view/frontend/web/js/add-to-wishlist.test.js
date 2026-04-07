/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

define([
    'jquery',
    'Magento_Wishlist/js/add-to-wishlist'
], function ($, Widget) {
    'use strict';

    describe('Testing addToWishlist widget', function () {
        var wdContainer,
            wishlistWidget,
            eventMock = {
                preventDefault: jasmine.createSpy(),
                stopPropagation: jasmine.createSpy()
            };

        beforeEach(function () {
            wdContainer = $('<input type="hidden" class="bundle-option-11  product bundle option" \n' +
                'name="bundle_option[11]" value="15" aria-required="true"/>');
            wishlistWidget = new Widget();
            $.fn.validation = {};
        });

        afterEach(function () {
            $(wdContainer).remove();
        });

        it('widget extends jQuery object', function () {
            expect($.fn.addToWishlist).toBeDefined();
        });

        it('widget gets options', function () {
            wdContainer.addToWishlist({
                'bundleInfo': 'test'
            });
            expect(wdContainer.addToWishlist('option', 'bundleInfo')).toBe('test');
        });

        it('verify update wichlist with validate product qty, valid qty', function () {
            var validation = spyOn($.fn, 'validation').and.returnValue(false);

            wishlistWidget._validateWishlistQty(eventMock);
            expect(validation).toHaveBeenCalled();
            expect(eventMock.preventDefault).toHaveBeenCalled();
            expect(eventMock.stopPropagation).toHaveBeenCalled();
        });

    });
});
