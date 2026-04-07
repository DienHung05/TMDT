/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/* eslint-disable max-nested-callbacks */
define([
    'squire',
    'ko',
    'jquery',
    'uiComponent'
], function (Squire, ko, $, Component) {
    'use strict';

<<<<<<< HEAD
    describe('paypal/js/view/payment/method-renderer/paypal-express-in-context', function () {
=======
    describe('paypal/js/view/payment/method-renderer/paypal-express-abstract', function () {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        var injector = new Squire(),
            mocks = {
                'Magento_Paypal/js/action/set-payment-method': jasmine.createSpy(),
                'Magento_Paypal/js/view/payment/method-renderer/paypal-express-abstract': Component,
                'Magento_Checkout/js/model/quote': {
                    billingAddress: ko.observable(),
                    shippingAddress: ko.observable(),
                    paymentMethod: ko.observable()
                },
                'Magento_Checkout/js/model/payment/additional-validators': {
                    validate: jasmine.createSpy().and.returnValue(true)
                },
                'Magento_Paypal/js/in-context/express-checkout-smart-buttons': jasmine.createSpy(),
                'Magento_Customer/js/customer-data': {
                    invalidate: jasmine.createSpy()
                }
            },
            obj;

        beforeAll(function (done) {
            window.checkoutConfig = {
                quoteData: {
                    /* jscs:disable requireCamelCaseOrUpperCaseIdentifiers */
<<<<<<< HEAD
                    entity_id: 1
=======
                    entity_Id: 1
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                },
                formKey: 'formKey'
            };
            window.customerData = {
                id: 1
            };
            injector.mock(mocks);
            injector.require(
                ['Magento_Paypal/js/view/payment/method-renderer/in-context/checkout-express'],
                function (Constr) {
                    obj = new Constr({
                        provider: 'provName',
                        name: 'test',
                        index: 'test',
                        item: {
                            method: 'payflow_express_bml'
                        },
                        clientConfig: {}
                    });
                    done();
                });
        });
<<<<<<< HEAD
        /*eslint-disable no-unused-vars*/
=======

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        afterEach(function () {
            try {
                injector.clean();
                injector.remove();
            } catch (e) {}
        });

        describe('check smart button initialization', function () {
            it('express-checkout-smart-buttons is initialized', function () {

                obj.renderPayPalButtons();
                expect(mocks['Magento_Paypal/js/in-context/express-checkout-smart-buttons']).toHaveBeenCalled();
            });
        });
    });
});
