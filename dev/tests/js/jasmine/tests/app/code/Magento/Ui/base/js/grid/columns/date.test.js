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
    'underscore',
<<<<<<< HEAD
    'moment',
    'Magento_Ui/js/grid/columns/date'
], function (_, moment, Date) {
=======
    'Magento_Ui/js/grid/columns/date'
], function (_, Date) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    'use strict';

    describe('Ui/js/grid/columns/date', function () {
        var date;

        beforeEach(function () {
            date = new Date({
<<<<<<< HEAD
                dataScope: 'abstract'
            });
=======
                    dataScope: 'abstract'
                });
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        });

        describe('initConfig method', function () {
            it('check for chainable', function () {
                expect(date.initConfig()).toEqual(date);
            });
            it('check for extend', function () {
                date.initConfig();
                expect(date.dateFormat).toBeDefined();
            });
        });
<<<<<<< HEAD

        describe('getLabel method', function () {
            it('uses moment.updateLocale when storeLocale is defined', function () {
                var value,
                    label;

                date.storeLocale = 'en_US';
                date.calendarConfig = {
                    week: { dow: 1 }
                };
                date.index = 'created_at';

                date._super = function () {
                    return '2025-11-18 15:30:00';
                };

                value = {
                    created_at: '2025-11-18 15:30:00'
                };

                spyOn(moment, 'updateLocale').and.callThrough();

                label = date.getLabel(value, 'YYYY-MM-DD');

                expect(moment.updateLocale).toHaveBeenCalledWith(
                    'en_US',
                    jasmine.any(Object)
                );
                expect(label).toBe('2025-11-18');
            });
        });
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    });
});
