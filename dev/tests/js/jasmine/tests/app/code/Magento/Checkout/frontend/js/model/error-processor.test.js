/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/*eslint max-nested-callbacks: 0*/
define([
    'squire'
], function (Squire) {
    'use strict';

    describe('Magento_Checkout/js/model/error-processor', function () {
        var injector = new Squire(),
            mocks = {
                'mage/url': {
                    /** Method stub. */
                    build: jasmine.createSpy()
                },
                'Magento_Ui/js/model/messageList': jasmine.createSpy('globalList')
            },
            model;

        beforeEach(function (done) {
            injector.mock(mocks);
            injector.require([
                'Magento_Checkout/js/model/error-processor'
            ], function (processor) {
                model = processor;

                done();
            });
        });

        describe('Check process method', function () {
            it('check on success response with valid response data', function () {
                var messageObject = {
                        message: 'Valid error message!'
                    },
                    messageContainer = jasmine.createSpyObj('globalMessageList', ['addErrorMessage']);

                model.process({
                    status: 200,
                    responseText: JSON.stringify(messageObject)
                }, messageContainer);
                expect(messageContainer.addErrorMessage).toHaveBeenCalledWith(messageObject);
            });

            it('check on success response with invalid response data', function () {
                var messageContainer = jasmine.createSpyObj('globalMessageList', ['addErrorMessage']),
                    messageObject = {
                        message: 'Something went wrong with your request. Please try again later.'
                    };

                model.process({
                    status: 200,
                    responseText: ''
                }, messageContainer);
                expect(messageContainer.addErrorMessage)
                    .toHaveBeenCalledWith(messageObject);
            });

            it('check on failed status', function () {
                var messageContainer = jasmine.createSpyObj('globalMessageList', ['addErrorMessage']);

<<<<<<< HEAD
                let messageObject = {
                    message: 'You are not authorized to access this resource.'
                };

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                spyOn(model, 'redirectTo').and.callFake(function () {});
                model.process({
                    status: 401,
                    responseText: ''
                }, messageContainer);
<<<<<<< HEAD
                expect(messageContainer.addErrorMessage)
                    .toHaveBeenCalledWith(messageObject);
=======
                expect(mocks['mage/url'].build)
                    .toHaveBeenCalled();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            });
        });
    });
});
