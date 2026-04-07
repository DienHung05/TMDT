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
    'underscore',
    'Magento_Checkout/js/model/default-post-code-resolver'
], function (_, DefaultPostCodeResolver) {
    'use strict';

    describe('checkout/js/model/default-post-code-resolver', function () {
        var defaultPostCodeResolver;

        beforeEach(function () {
            defaultPostCodeResolver = DefaultPostCodeResolver;
            window.checkoutConfig = {
                defaultPostcode: '19800'
            };
        });

        it('resolve', function () {
            expect(defaultPostCodeResolver.resolve()).toBeNull();
        });
        it('resolve with using default code', function () {
            defaultPostCodeResolver.setUseDefaultPostCode(true);
            expect(defaultPostCodeResolver.resolve()).toEqual('19800');
        });
    });

});
